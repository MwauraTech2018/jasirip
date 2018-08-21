<?php

namespace App\Repositories;

use App\Models\Gurantor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GurantorRepository
 * @package App\Repositories
 * @version August 17, 2018, 12:48 pm EAT
 *
 * @method Gurantor findWithoutFail($id, $columns = ['*'])
 * @method Gurantor find($id, $columns = ['*'])
 * @method Gurantor first($columns = ['*'])
*/
class GurantorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'loan_id',
        'mem_no',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gurantor::class;
    }
}
