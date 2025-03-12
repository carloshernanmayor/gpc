<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guion extends Model
{
    use HasFactory;
    protected $fillable = ['canal','mensaje','fecha_creacion'];
protected $primaryKey='id_guion';
protected $table='guion_ventas';

public function atenciones(): HasMany

{
    return $this->hasMany(Atencion::class, 'id_guion');
}

}
