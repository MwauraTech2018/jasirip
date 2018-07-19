<?php

namespace App\Repositories;

use App\Models\Client;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version July 19, 2018, 10:23 am EAT
 *
 * @method Client findWithoutFail($id, $columns = ['*'])
 * @method Client find($id, $columns = ['*'])
 * @method Client first($columns = ['*'])
*/
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'national_id',
        'gender',
        'phone_number',
        'email',
        'b_role',
        'created_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }
}
