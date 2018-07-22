<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Saving
 * @package App\Models
 * @version July 21, 2018, 2:25 pm EAT
 *
 * @property \App\Models\ServiceOption serviceOption
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string payment_mode
 * @property integer service_id
 * @property bigInteger client_id
 * @property string ref_number
 * @property integer bank_id
 * @property float amount
 * @property string paybill
 * @property string phone_number
 * @property string BillRefNumber
 * @property string TransID
 * @property string|\Carbon\Carbon TransTime
 * @property string FirstName
 * @property string middleName
 * @property string LastName
 * @property string|\Carbon\Carbon received_on
 * @property integer created_by
 * @property boolean status
 * @property string transferred_from
 * @property string transferred_to
 * @property string transferred_by
 */
class Saving extends Model
{
    use SoftDeletes;

    public $table = 'payments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'payment_mode' => 'string',
        'service_id' => 'integer',
        'ref_number' => 'string',
        'bank_id' => 'integer',
        'amount' => 'float',
        'paybill' => 'string',
        'phone_number' => 'string',
        'BillRefNumber' => 'string',
        'TransID' => 'string',
        'FirstName' => 'string',
        'middleName' => 'string',
        'LastName' => 'string',
        'created_by' => 'integer',
        'status' => 'boolean',
        'transferred_from' => 'string',
        'transferred_to' => 'string',
        'transferred_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceOption()
    {
        return $this->belongsTo(\App\Models\ServiceOption::class);
    }
    public function masterfile()
    {
//        return $this->belongsTo(\App\Models\Masterfile::class,'landlord_id');
        return $this->belongsTo(\App\Models\Masterfile::class,'client_id');

    }
}
