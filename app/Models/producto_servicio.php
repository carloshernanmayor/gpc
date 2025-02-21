<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_servicio extends Model
{
use HasFactory;
protected $fillable = ['nombre','descripcion','precio','tipo'];
public $timestamps = false;
protected $primaryKey='id_producto_servicio';
protected $table='producto_servicio';
}