<?php

namespace App\Http\Controllers\admin;

use App\Delegate;
use App\Good;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Http\Requests;
use App\Invoice;
use App\Order;
use App\Agent;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;


class OrdersController extends Controller
{

    public function getAllOrders()
    {
        $Agents = Agent::get();
        $delegates = Delegate::get();
        $goods = Good::get();
        if (Auth::guard('admins')->user()->flag == 0 || Auth::guard('admins')->user()->flag == 4) {
            $orders = Order::get();
        } else {
            $orders = Order::where('admin_id', Auth::guard('admins')->user()->id)->get();
        }
        return view('admin.pages.orders.allorders', compact('orders', 'delegates', 'Agents', 'goods'));
    }

    public function getInvoice($id = null)
    {
        $order = Order::find($id);
        if ($order) {
            $invoice = $order->invoice ?: new Invoice();
            $products = $order->products;
            return view('admin.pages.orders.orders-bill', compact('order', 'invoice', 'products'));
        }
        abort(404);
    }

    public function postInvoice($id, Request $request)
    {
        DB::transaction(function () use ($request, $id) {
            $order = Order::find($id);

            if ($order) {

                $invoice = [
                    'name' => $request->input('name'),
                    'type' => $request->input('type'),
                    'store' => $request->input('store'),
                    'number' => $request->input('number'),
                    'note_book' => $request->input('note_book'),
                    'payment_method' => $request->input('payment_method'),
                    'sub_total' => $request->input('sub_total'),
                    'extra_money' => $request->input('extra_money'),
                    'discount' => $request->input('discount'),
                    'paid_amount' => $request->input('paid_amount'),
                    'paid_rest' => $request->input('paid_rest'),
                    'notes' => $request->input('notes'),
                ];

                // fetch bill products arrays
                $ids = $request->input('product_id');
                $codes = $request->input('code');
                $prices = $request->input('price');
                $quantities = $request->input('quantity');
                $units = $request->input('unit');
                $product_totals = $request->input('product_total');

                // check point for updating or inserting common invoice details
                if ($order->invoice) {
                    $order->invoice()->update($invoice);
                } else {
                    $order->invoice()->save(new Invoice($invoice));
                }

                // detach the old bill products
                $order->products()->detach();

                // attach the new ones
                for ($i = 0, $count = count($ids); $i < $count; $i++) {
                    $order->products()->attach($ids[$i], [
                        'price' => $prices[$i],
                        'total' => $product_totals[$i],
                        'quantity' => $quantities[$i],
                        'code' => $codes[$i],
                        'unit' => $units[$i],
                    ]);
                }

                // notify with operation success
                Session::push('success',' تتم الحفظ بنحاج ' );

            } else {
                // [Page Not Found] for unknown orders
                abort(404);
            }
        });

        // redirect back after operation success
        return redirect()->back();
    }

    public function postAdd(DelegateRequest $request)
    {

        $order = new Order();
        $order->code = $request->input('code');
        $order->name = $request->input('name');

        $order->flag = "1";
        $order->admin_id = Auth::guard('admins')->user()->id;

        $order->save();

        session()->push('success', 'تمت الاضافة بنجاح');
        return redirect('orders/all-orders');
    }


    public function getEdit($id)
    {
        $Agents = Agent::get();
        $delegates = Delegate::get();
        $goods = Good::get();
        $old = Order::find($id);
        return view('admin.pages.orders.editorder', compact('old', 'delegates', 'Agents', 'goods'));

    }

    public function postEdit(Request $request, $id)
    {

        $order = Order::find($id);
        $order->code = $request->input('code');
        $order->name = $request->input('name');

        $order->flag = "1";
        $order->save();


        session()->push('success', 'تم تأكيد الطلبية بنجاح');
        return redirect('orders/all-orders');

    }

    public function getDelete($id)
    {
        $delete = Order::find($id);
        $delete->delete();
        return redirect('orders/all-orders');
    }
}
