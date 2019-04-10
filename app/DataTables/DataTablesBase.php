<?php

namespace App\DataTables;

use App\Localidad;
use Yajra\DataTables\Services\DataTable;

use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Engines\BaseEngine;
use Yajra\Datatables\Services\DataTable;





class DataTablesBase extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'datatablesbase.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Localidad $model)
    {
        return $model->newQuery()->select('id', 'nombre','cp', 'zona_id', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nombre',
            'cp',
            'zona_id',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'DataTablesBase_' . date('YmdHis');
    }
}
