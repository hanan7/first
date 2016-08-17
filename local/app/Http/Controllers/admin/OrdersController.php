<?php

namespace App\Http\Controllers\admin;

use App\Agent;
use App\Classes\Format;
use App\Classes\SSP;
use App\Delegate;
use App\Good;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Invoice;
use App\Order;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Session;
use function abort;
use function redirect;
use function session;
use function url;
use function view;

class OrdersController extends Controller {

    private $config = array(
        'db' => [
            'user' => 'root',
            'pass' => '',
            'db' => 'sohil;charset=utf8',
            'host' => '127.0.0.1'
        ],
        'table' => 'invoices',
        'primary_key' => 'id',
    );

    public function getAllOrders() {
        return view('admin.pages.orders.allorders');
    }

    public function getAllInvoices() {
        return view('admin.pages.orders.allinvoices');
    }

    public function getSearch($name, Request $request) {
        switch ($name) {
            case 'order':
                return $this->processSearch('order',$request);
            case 'invoice':
                return $this->processSearch('invoice',$request);
            default :
                abort(404);
        }
    }

    private function processSearch($name, $request) {
        $columns = array(
            array('db' => 'number', 'dt' => 0),
            array('db' => 'note_book', 'dt' => 1),
            array('db' => 'name', 'dt' => 3),
            array('db' => 'payment_method', 'dt' => 4),
            array('db' => 'date', 'dt' => 2,
                'formatter' => function( $d, $row ) {
                    return Format::arabicFormat(Carbon::parse($d)->getTimestamp());
                }
            ),
            array('db' => 'id', 'dt' => 5,
                'formatter' => function( $d, $row ) use ($name){
                
                    return '<a href="' . url('orders/'.$name.'/' . $d) . '"  class="btn green btnedit" data-original="">
                            <li class="fa fa-pencil"> تفاصيل او تعديل</li>
                        </a>
                        <a href="#deletemodal" data-toggle="modal" class="btn btn-danger btndelet"  >
                            <li class="fa fa-trash">  مسح</li>
                        </a>
                        <a class="btn blue btn-print" data-order-id="' . $d . '">
                            <li class="fa fa-printer">  طباعه</li>
                        </a>';
                }
        ));

        return SSP::complex($request->all(), $this->config['db'], $this->config['table'], $this->config['primary_key'], $columns, null, [
                    "related_to = '$name'"
        ]);
    }

    public function getOrder($id = null) {
        $order = Invoice::find($id);

// if the order is already exist
        if ($order) {

// make sure that the fetch one is an order not something else.
            if ($order->related_to !== 'order') {
                abort(404);
            }

// fetch the products of the order and start the template
            $products = $order->products;
            return view('admin.pages.orders.orders-bill', compact('order', 'products'));
        } else if ($id) {
            abort(404);
        }
// if the order isn't found, start a new one
        return view('admin.pages.orders.orders-bill', ['order' => new Invoice, 'products' => null]);
    }

    public function getInvoice($id = null) {
        $invoice = Invoice::find($id);

// if the order is already exist
        if ($invoice) {

// make sure that the fetch one is an order not something else.
            if ($invoice->related_to !== 'invoice') {
                abort(404);
            }

// fetch the products of the order and start the template
            $products = $invoice->products;
            return view('admin.pages.orders.invoices-bill', compact('invoice', 'products'));
        } else if ($id) {
            abort(404);
        }
// if the order isn't found, start a new one
        return view('admin.pages.orders.invoices-bill', ['invoice' => new Invoice, 'products' => null]);
    }

    public function postOrder(Request $request, $id = null) {
        $_this = $this;
        DB::transaction(function () use ($request, $id, $_this) {
            $_this->processBill($request, $id, 'order');
        });

// redirect back after operation success
        return redirect()->back();
    }

    public function postInvoice(Request $request, $id = null) {
        $_this = $this;
        DB::transaction(function () use ($request, $id, $_this) {
            $_this->processBill($request, $id, 'invoice');
        });

// redirect back after operation success
        return redirect()->back();
    }

    private function processBill(Request $request, $id, $related_to) {

        $bill = Invoice::find($id);

        $data = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'store' => $request->input('store'),
            'number' => $request->input('number'),
            'note_book' => $request->input('note_book'),
            'payment_method' => $request->input('payment_method'),
            'sub_total' => $request->input('sub_total'),
            'date' => Carbon::parse($request->input('date')),
            'extra_money' => $request->input('extra_money'),
            'discount' => $request->input('discount'),
            'paid_amount' => $request->input('paid_amount'),
            'paid_rest' => $request->input('paid_rest'),
            'related_to' => $related_to,
            'notes' => $request->input('notes'),
        ];



        if ($bill) {
            $bill->update($data);
        } else {
            $bill = Invoice::create($data);
        }

// fetch bill product arrays
        $ids = $request->input('product_id');
        $codes = $request->input('code');
        $prices = $request->input('price');
        $quantities = $request->input('quantity');
        $units = $request->input('unit');
        $product_totals = $request->input('product_total');

// detach the old bill products
        $bill->products()->detach();

// attach the new ones
        for ($i = 0, $count = count($ids); $i < $count; $i++) {
            $bill->products()->attach($ids[$i], [
                'price' => $prices[$i],
                'total' => $product_totals[$i],
                'quantity' => $quantities[$i],
                'code' => $codes[$i],
                'unit' => $units[$i],
            ]);
        }

// notify with operation success
        Session::push('success', ' تتم الحفظ بنحاج ');
    }

    public function postAdd(DelegateRequest $request) {

        $bill = new Order();
        $bill->code = $request->input('code');
        $bill->name = $request->input('name');

        $bill->flag = "1";
        $bill->admin_id = Auth::guard('admins')->user()->id;

        $bill->save();

        session()->push('success', 'تمت الاضافة بنجاح');
        return redirect('orders/all-orders');
    }

    public function getEdit($id) {
        $Agents = Agent::get();
        $delegates = Delegate::get();
        $goods = Good::get();
        $old = Order::find($id);
        return view('admin.pages.orders.editorder', compact('old', 'delegates', 'Agents', 'goods'));
    }

    public function postEdit(Request $request, $id) {

        $bill = Order::find($id);
        $bill->code = $request->input('code');
        $bill->name = $request->input('name');

        $bill->flag = "1";
        $bill->save();


        session()->push('success', 'تم تأكيد الطلبية بنجاح');
        return redirect('orders/all-orders');
    }

    public function getDelete($id) {
        $delete = Invoice::find($id);
        $delete->delete();
        return redirect('orders/all-orders');
    }

}
