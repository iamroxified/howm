<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sermon extends Model
{
    use HasFactory;

    protected $table = 'sermon';

    protected $fillable = [
        'ser_id',
        'ser_name',
        'ser_img',
        'ser_desc',
        'ser_link',
        'ser_cat',
        'ser_date',
        'ser_stat',
    ];

    /**
     * Boot method to auto-generate ser_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->ser_id)) {
                $model->ser_id = self::generateUniqueSermonId();
            }
        });
    }

    /**
     * Generate a unique sermon ID
     */
    private static function generateUniqueSermonId()
    {
        do {
            $serId = strtoupper(Str::random(8));
        } while (self::where('ser_id', $serId)->exists());

        return $serId;
    }
}
