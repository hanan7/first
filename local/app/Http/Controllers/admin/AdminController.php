<?php

namespace App\Http\Controllers\admin;

use App\Classes\SSP;
use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function postLogin(Request $r) {
        $admin = auth()->guard('admins');

        if ($admin->attempt(['username' => $r->input('username'), 'password' => $r->input('password')])) {
            return redirect()->intended('admin');
        } else {
            session()->push('m', 'اسم مستخدم او رقم سري غير صحيح ');
            return redirect('admin/login');
        }
    }

    function getLogin() {
        return view("admin/auth/login");
    }

    public function getLogout() {
        auth()->guard('admins')->logout();
        return redirect('/admin/login');
    }

    public function getSearch(Request $request) {
        // DB table to use
        $table = 'goods';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'code', 'dt' => 0),
            array('db' => 'name', 'dt' => 1),
            array('db' => 'points', 'dt' => 2),
            array('db' => 's_price', 'dt' => 3,
                'formatter' => function( $d, $row ) {
                    return '$' . number_format($d);
                }
            ),
            array('db' => 'quantity', 'dt' => 4),
            array('db' => 'b_price', 'dt' => 5,
                'formatter' => function( $d, $row ) {
                    return '$' . number_format($d);
                }
            ),
            array('db' => 'image', 'dt' => 6,
                'formatter' => function( $d, $row ) {
                    return '<img src="' . url('uploads/products/' . $d) . '" style="width:100px; height:100px; "/>';
                }
            ),
            array('db' => 'company', 'dt' => 7),
            array('db' => 'store_id', 'dt' => 8,
                'formatter' => function( $d, $row ) {
                    return Store::find($d)->name;
                }
            ),
            array('db' => 'id', 'dt' => 9,
                'formatter' => function( $d, $row ) {
                    return '<a href="' . url('products/edit/' . $d) . '"  class="btn green btnedit" data-original="">
                            <li class="fa fa-pencil"> تعديل</li>
                        </a>
                        <a href="#deletemodal" data-toggle="modal" class="btn btn-danger btndelet"  >
                            <li class="fa fa-trash">  مسح</li>
                        </a>
                        <button type="button" class="btn-details btn btn-dafault" data-product-id="' . $d . '" >تفاصيل</button>';
                }
            ),
        );

        $sql_details = array(
            'user' => 'root',
            'pass' => '',
            'db' => 'sohil;charset=utf8',
            'host' => '127.0.0.1'
        );


        /*         * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */


        echo json_encode(
                SSP::simple($request->all(), $sql_details, $table, $primaryKey, $columns));
    }
}
