<?php

namespace App\Http\Controllers\admin;

use App\Classes\Format;
use App\Good;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function abort;
use function response;
use function view;

class ReportsController extends Controller {

    private function formate($rows) {
        $new_rows = [];
        foreach ($rows as $row) {
            $new_row = [];
            foreach ($row as $k => $v) {
                switch ($k) {
                    case 'date' :
                        $new_row[$k] = Format::arabicFormat(strtotime($v));
                        break;
                    case 'payment_method':
                        if ($v === 'cheque') {
                            $new_row[$k] = 'شيك';
                        } else if ($v === 'cash') {
                            $new_row[$k] = 'مدفوع نقدا';
                        } else {
                            $new_row[$k] = 'فيزا';
                        }
                        break;
                    default :
                        $new_row[$k] = $v;
                }
            }
            $new_rows[] = $new_row;
        }
        return $new_rows;
    }

    public function getPage($name) {
        switch ($name) {
            case 'products':
                return view('admin.pages.reports.products-report');
            case 'orders':
                return view('admin.pages.reports.orders-report');
        }
        abort(404);
    }

    public function postExplore($name, Request $request) {

        $query = $request->input('query');
        $rows = $this->getRowsBetween($name, $request->input('from'), $request->input('to'));
        if (!empty($query)) {
            if ($request->input('filter') == '_all') {
                $cols = $this->getColumnsNames($name);

                $rows = $rows->where(function ($sql) use ($query, $cols) {

                    $sql = $sql->where($cols[0], 'LIKE', "%{$query}%");
                    $count = count($cols);

                    unset($cols[0]);
                    unset($cols[$count - 1]);
                    unset($cols[$count - 2]);

                    foreach ($cols as $col) {
                        $sql = $sql->orWhere($col, 'LIKE', "%{$query}%");
                    }
                });
            } else {
                $rows = $rows->where($request->input('filter'), 'LIKE', "%{$query}%");
            }
        }
        return response()->json($this->formate($rows->get()->toArray()));
    }

    public function postFilter($name) {
        $options = [];
        switch ($name) {
            case 'store':
                foreach (Store::all() as $store) {
                    $options[] = ['value' => $store->id, 'content' => $store->name];
                }
                break;
            case 'payment_method':
                $options[] = ['value' => 'visa', 'content' => 'فيزا'];
                $options[] = ['value' => 'cash', 'content' => 'المدفوع نقدا'];
                $options[] = ['value' => 'cheque', 'content' => 'شيك'];
                break;
            case 'type':
                $options[] = ['value' => 'cash', 'content' => 'نقدي'];
                $options[] = ['value' => 'later', 'content' => 'اجل'];
                break;
        }
        return response()->json($options);
    }

    private function getColumnsNames($name) {
        switch ($name) {
            case 'products':
                return (new Good)->getTableColumns();
            case 'orders':
                return (new Invoice)->getTableColumns();
        }
        return [];
    }

    private function getRowsBetween($name, $from, $to) {
        switch ($name) {
            case 'products':
                return Good::whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            case 'orders':
                return Invoice::whereBetween('date', [Carbon::parse($from), Carbon::parse($to)])->where('related_to', 'order');
        }
        abort(404);
    }

}
