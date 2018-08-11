<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LoanApplication
 * @package App\Models
 * @version August 10, 2018, 2:40 pm EAT
 *
 * @property \App\Models\LoanType loanType
 * @property \App\Models\Masterfile masterfile
 * @property \Illuminate\Database\Eloquent\Collection payments
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property bigInteger mem_no
 * @property integer loan_type_id
 * @property date application_date
 * @property float applied_amt
 * @property float approved_amt
 * @property date approval_date
 * @property float repayment_prd
 * @property float balance_todate
 * @property integer created_by
 * @property integer approved_by
 * @property boolean status
 */
class LoanApplication extends Model
{
    use SoftDeletes;

    public $table = 'loan_applications';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'loan_type_id' => 'integer',
        'application_date' => 'date',
        'applied_amt' => 'float',
        'approved_amt' => 'float',
        'approval_date' => 'date',
        'repayment_prd' => 'float',
        'balance_todate' => 'float',
        'created_by' => 'integer',
        'approved_by' => 'integer',
        'status' => 'boolean'
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
    public function loantype()
    {
        return $this->belongsTo(\App\Models\LoanType::class,'loan_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function masterfile()
    {
        return $this->belongsTo(\App\Models\Masterfile::class,'mem_no');
    }
//    public function loantype()
//    {
//        return $this->belongsTo(\App\Models\LoanType::class,'loan_type_id');
//    }
}
