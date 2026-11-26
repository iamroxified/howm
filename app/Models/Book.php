<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'bk_id',
        'bk_title',
        'bk_cat',
        'bk_link',
        'bk_img',
        'bk_desc',
        'bk_amount',
        'bk_down_count',
        'bk_stat',
    ];

    public function getFilePathAttribute()
    {
        return $this->bk_link;
    }
}
