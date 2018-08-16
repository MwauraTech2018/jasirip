<?php

namespace App\DataTables;

use App\Models\LoanApplication;
use App\Models\User;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LoanApplicationDataTable extends DataTable
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

        return $dataTable
//            ->addColumn('action', 'loan_applications.datatables_actions')
//            ->addColumn('gurantors','view gurantors')
            ->editColumn('application_date',function($loan){

                return Carbon::parse($loan->application_date)->toFormattedDateString();
            })
            ->editColumn('approval_date',function($loan){

                return Carbon::parse($loan->approval_date)->toFormattedDateString();
            })
            ->editColumn('status',function ($loans){

                if(!$loans->status){
                    return '<label class="label label-danger">Not Approved</label>';
                }
                    return '<label class="label label-success">Approved</label>';
            })
            ->editColumn('created_by',function($loan){

                if(!is_null($loan->created_by)){

                    return User::find($loan->created_by)->name;
                }
                    return '';
            })

            ->editColumn('approved_by',function ($loan){

                if(!$loan->approved_by){
                    return '<a href="#edit2-modal" data-toggle="modal" e-id="'.$loan->id.'" hint="'.url('loanApplications/'.$loan->id).'" class="btn btn-default btn-xs edit-common" ><i class="glyphicon glyphicon-eye-edit"></i>update</a>';
                }
//                <a href="#edit-modal" data-toggle="modal" e-id="{{ $id}}" hint="{!! url('banks/'.$id) !!}" class='btn btn-default btn-xs edit-common'><i class="glyphicon glyphicon-eye-edit"></i> edit</a>
                if(!is_null($loan->approved_by)){

                    return User::find($loan->approved_by)->name;
                }
                return '';

            })


            ->rawColumns(['status','created_by','approved_by']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LoanApplication $model)
    {
        return $model->newQuery()
            ->select('loan_applications.*')
            ->orderByDesc('id')
            ->with(['masterfile','loantype']);
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
            ->addAction(['width' => '200px'])
            ->parameters([
//                'dom'     => 'Bfrtip',
//                'order'   => [[0, 'desc']],
                'scrollX'=>true,
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
//            'mem_no',
            'masterfile.full_name'=>[
                'title'=>'Client'
            ],
            'loan_type_id',
//        'loantype.name'=>[
//            'title'=>'Ltype'
//        ],
            'application_date',
            'applied_amt',
            'approved_amt',
            'approval_date'=>[
                'title'=>'DateApproved'
            ],
            'repayment_prd'=>[
                'title'=>'Repayments'
            ],
            'balance_todate'=>[
                'title'=>'Balance'
            ],
            'created_by',
//            'masterfile.full_name'=>[
//                'title'=>'Client'
//            ],
            'approved_by'=>[
                'title'=>'Updated By'
            ],
            'status',
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
        return 'loan_applicationsdatatable_' . time();
    }
}