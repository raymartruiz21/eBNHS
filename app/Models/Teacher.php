<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guarded=[];
    public function getFullNameAttribute()
    {
        return ucwords("{$this->teacher_firstname} {$this->teacher_lastname}");
    }
}
