<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    use HasFactory;

    public function getImageShowAttribute() {
        return $this->image != "" ? asset('upload/class/' . $this->image) : null;
    }
}
