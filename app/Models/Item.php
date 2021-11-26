<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['cedula','nombre','apellido','direccion','celular','plan','ip','estado'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function scopeActive($query){
      return $query->where('estado',1);
    }
    
}
