<?php

namespace App\DataTables;

use App\Models\Saving;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SavingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

//        dd($dataTable);
//        return $dataTable
//        ->editColumn('received_on',function($query){
//        return Carbon::parse($query->received_on)->toDateString();
//    });
        return $dataTable
            ->editColumn('received_on',function($payment){
//
                return Carbon::parse($payment->received_on)->toDateString();
//             ->editColumn('created_at')
            });

//        return $dataTable->addColumn('action', 'savings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Saving $model)
    {
//        return $model->newQuery()->with(['masterfile']);

        return $model->newQuery()
            ->select('payments.*')
            ->orderByDesc('payments.id')
            ->with(['masterfile']);

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
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    'create',
                    'export',
                    'print',
                    'reset',
                    'reload',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

//            'service_id',
//            'client_id',
            'masterfile.full_name'=>[
                'title'=>'Client'
            ],
            'masterfile.member_no'=>[
                'title'=>'Account Number'
            ],
            'payment_mode',
            'ref_number',
//            'bank_id',
            'amount',
            'received_on'
//            'paybill',
//            'phone_number',
//            'BillRefNumber',
//            'TransID'

//            'TransTime',
//            'FirstName',
//            'middleName',
//            'LastName',
//            'received_on',
//            'created_by',
//            'status',
//            'transferred_from',
//            'transferred_to',
//            'transferred_by'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'savingsdatatable_' . time();
    }
}