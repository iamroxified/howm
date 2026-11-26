<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dcg extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'type',
        'content',
        'file_path',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }
}
