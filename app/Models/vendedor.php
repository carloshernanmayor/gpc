<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class vendedor extends Model
{
    use HasFactory;
protected $fillable = ['nombre','identificacion','telefono','direccion','correo'];
public $timestamps = false;
protected $primaryKey='id_vendedor';
protected $table='vendedor';

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
