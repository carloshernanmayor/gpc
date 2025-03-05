<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    protected $fillable = ['id_atencion','id_vendedor','id_posible_cliente','descripcion'];
    public $timestamps = true;
    protected $primaryKey='id_atencion';
    protected $table='atencion';
}
