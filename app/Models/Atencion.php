<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atencion extends Model
{
    use HasFactory;
    protected $fillable = ['id_atencion','id_vendedor','id_cliente', 'id_guion','fecha','resultado','observaciones'];
    public $timestamps = false;
    protected $primaryKey='id_atencion';
    protected $table='atencion';


public function cliente(): BelongsTo
{
    return $this->belongsTo(cliente::class, 'id_cliente');
}

public function vendedor(): BelongsTo
{
    return $this->belongsTo(vendedor::class, 'id_vendedor');
}

public function guion(): BelongsTo
{
    return $this->belongsTo(guion::class, 'id_guion');
}

public function producto(): BelongsTo
{
    return $this->belongsTo(producto::class,'id_producto');
}


}
