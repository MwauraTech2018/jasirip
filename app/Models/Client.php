<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version July 19, 2018, 10:23 am EAT
 *
 * @property \Illuminate\Database\Eloquent\Collection CustomerAccount
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string full_name
 * @property string national_id
 * @property string gender
 * @property string phone_number
 * @property string email
 * @property string b_role
 * @property integer created_by
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'masterfiles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'member_no',
        'full_name',
        'national_id',
        'gender',
        'phone_number',
        'email',
        'b_role',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'member_no'=>'integer',
        'full_name' => 'string',
        'national_id' => 'string',
        'gender' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'b_role' => 'string',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customerAccounts()
    {
        return $this->hasMany(\App\Models\CustomerAccount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
