<?php

namespace App\Http\Controllers\admin;

use App\Good;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function abort;
use function response;
use function view;

class ReportsController extends Controller {

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
        return response()->json($rows->get()->toArray());
    }

    private function getColumnsNames($name) {
        switch ($name) {
            case 'products':
                $o = new Good;
                return $o->getTableColumns();
            case 'orders':
                $o = new Order;
                return $o->getTableColumns();
        }
        return [];
    }

    private function getRowsBetween($name, $from, $to) {
        switch ($name) {
            case 'products':
                return Good::whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            case 'orders':
                return Order::whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
        }
        abort(404);
    }

}
