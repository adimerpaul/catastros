<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }
}
