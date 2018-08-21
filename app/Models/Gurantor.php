<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gurantor
 * @package App\Models
 * @version August 17, 2018, 12:48 pm EAT
 *
 * @property \App\Models\LoanApplication loanApplication
 * @property \App\Models\Masterfile masterfile
 * @property \Illuminate\Database\Eloquent\Collection loanApplications
 * @property \Illuminate\Database\Eloquent\Collection payments
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer loan_id
 * @property bigInteger mem_no
 * @property float amount
 */
class Gurantor extends Model
{
    use SoftDeletes;

    public $table = 'gurantors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'loan_id',
        'mem_no',
        'amount',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'amount' => 'float',
        'name'=>'string'
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
