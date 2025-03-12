<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atencion extends Model
{
    use HasFactory;
    protected $fillable = ['id_atencion','id_vendedor','id_cliente', 'id_guion','fecha','resultado','observaciones'];
    public $timestamps = true;
    protected $primaryKey='id_atencion';
    protected $table='atencion';


public function cliente(): BelongsTo
{
    return $this->belongsTo(cliente::class);
}

public function vendedor(): BelongsTo
{
    return $this->belongsTo(vendedor::class);
}

public function guion(): BelongsTo
{
    return $this->belongsTo(guion::class);
}


}
