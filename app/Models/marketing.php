<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marketing extends Model
{
use HasFactory;
protected $fillable = ['tipo_marketing'];
public $timestamps = false;
protected $primaryKey='id_marketing';
protected $table='marketing';
}