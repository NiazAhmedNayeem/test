<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function getImageShowAttribute() {
        return $this->image != "" ? asset('upload/student/' . $this->image) : null;
    }

    public function class()
    {
        return $this->belongsTo(SClass::class, 'class_id', 'id');
    }
}
