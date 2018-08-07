<?php

namespace App\Repositories;

use App\Models\LoanType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LoanTypeRepository
 * @package App\Repositories
 * @version August 7, 2018, 11:19 am EAT
 *
 * @method LoanType findWithoutFail($id, $columns = ['*'])
 * @method LoanType find($id, $columns = ['*'])
 * @method LoanType first($columns = ['*'])
*/
class LoanTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'int',
        'repayment_period'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LoanType::class;
    }
}
