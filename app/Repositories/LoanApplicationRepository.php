<?php

namespace App\Repositories;

use App\Models\LoanApplication;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LoanApplicationRepository
 * @package App\Repositories
 * @version August 10, 2018, 2:40 pm EAT
 *
 * @method LoanApplication findWithoutFail($id, $columns = ['*'])
 * @method LoanApplication find($id, $columns = ['*'])
 * @method LoanApplication first($columns = ['*'])
*/
class LoanApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mem_no',
        'loan_type_id',
        'application_date',
        'applied_amt',
        'approved_amt',
        'approval_date',
        'repayment_prd',
        'balance_todate',
        'created_by',
        'approved_by',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LoanApplication::class;
    }
}
