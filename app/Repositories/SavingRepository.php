<?php

namespace App\Repositories;

use App\Models\Saving;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SavingRepository
 * @package App\Repositories
 * @version July 21, 2018, 2:25 pm EAT
 *
 * @method Saving findWithoutFail($id, $columns = ['*'])
 * @method Saving find($id, $columns = ['*'])
 * @method Saving first($columns = ['*'])
*/
class SavingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'payment_mode',
        'service_id',
        'client_id',
        'ref_number',
        'bank_id',
        'amount',
        'paybill',
        'phone_number',
        'BillRefNumber',
        'TransID',
        'TransTime',
        'FirstName',
        'middleName',
        'LastName',
        'received_on',
        'created_by',
        'status',
        'transferred_from',
        'transferred_to',
        'transferred_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Saving::class;
    }
}
