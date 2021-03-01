<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    public function unit1()
    {
        return $this->belongsTo(Unit::class,'unit_id1');
    }
    public function unit2()
    {
        return $this->belongsTo(Unit::class,'unit_id2');
    }
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
