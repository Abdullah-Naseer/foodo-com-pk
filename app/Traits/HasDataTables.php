<?php

namespace App\Traits;

use Yajra\DataTables\Facades\DataTables;

trait HasDataTables
{

    public function dataTable($query ,string $route, callable $extraColumns = null)
    {
        $dataTable = DataTables::of($query)
        ->addColumn('action', function ($item) use ($route) {
                return view('admin.inc.table-actions', [
                    'item'  => $item,
                    'route' => $route,
                    ])->render();
                });

        if ($extraColumns) {
            $extraColumns($dataTable);
        }

        return $dataTable->escapeColumns([])->make(true);
    }



}
