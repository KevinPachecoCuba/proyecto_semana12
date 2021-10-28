<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cita_detalle
 * @package App\Models
 * @version October 28, 2021, 1:26 pm UTC
 *
 * @property integer $idcita
 */
class Cita_detalle extends Model
{
    //use SoftDeletes;

    public $table = 'cita_detalle';
    protected $primaryKey='idcita_detalle';
    public $timestamps=false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'idcita'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idcita_detalle' => 'integer',
        'idcita' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idcita' => 'nullable|integer'
    ];

    
}
