<?php

namespace App\Repositories;

use App\Models\LoanAccount;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LoanAccountRepository
 * @package App\Repositories
 * @version August 28, 2018, 7:15 pm EAT
 *
 * @method LoanAccount findWithoutFail($id, $columns = ['*'])
 * @method LoanAccount find($id, $columns = ['*'])
 * @method LoanAccount first($columns = ['*'])
*/
class LoanAccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'loan_id',
        'mem_no',
        'transaction_type',
        'date',
        'amount',
        'received_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LoanAccount::class;
    }
}
