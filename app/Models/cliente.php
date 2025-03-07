<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cliente extends Model
{
use HasFactory;
protected $fillable = ['nombre','identificacion','telefono','direccion','correo'];
public $timestamps = false;
protected $primaryKey='id_cliente';
protected $table='cliente';

public function atenciones(): HasMany
    {
        return $this->hasMany(Atencion::class, 'id_cliente');
    }
}