<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_servicio extends Model
{
use HasFactory;
protected $fillable = ['nombre','tipo','material','sector','dimensiones','fecha_creacion'];
public $timestamps = false;
protected $primaryKey='id_producto';
protected $table='producto';
}