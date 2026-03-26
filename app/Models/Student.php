<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'matric_no',
        'phone',
        'department',
        'level',
        'supervisor',
    ];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
