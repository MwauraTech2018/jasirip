<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LoanAccount
 * @package App\Models
 * @version August 28, 2018, 7:15 pm EAT
 *
 * @property \App\Models\LoanApplication loanApplication
 * @property \App\Models\Masterfile masterfile
 * @property \Illuminate\Database\Eloquent\Collection gurantors
 * @property \Illuminate\Database\Eloquent\Collection loanApplications
 * @property \Illuminate\Database\Eloquent\Collection payments
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer loan_id
 * @property bigInteger mem_no
 * @property string transaction_type
 * @property date date
 * @property float amount
 * @property integer received_by
 */
class LoanAccount extends Model
{
    use SoftDeletes;

    public $table = 'loanaccount';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'loan_id',
        'mem_no',
        'transaction_type',
        'date',
        'amount',
        'received_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'transaction_type' => 'string',
        'date' => 'date',
        'amount' => 'float',
        'received_by' => 'integer'
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
    public function loanApplication()
    {
        return $this->belongsTo(\App\Models\LoanApplication::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function masterfile()
    {
        return $this->belongsTo(\App\Models\Masterfile::class,'mem_no');
    }
}
