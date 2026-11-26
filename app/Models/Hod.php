<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hod extends Model
{
    use HasFactory;

    protected $table = 'hod';

    protected $fillable = [
        'hod_id',
        'hod_name',
        'hod_img',
        'hod_desc',
        'hod_link',
        'hod_cat',
        'hod_date',
        'hod_stat',
    ];

    /**
     * Boot method to auto-generate hod_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->hod_id)) {
                $model->hod_id = self::generateUniqueHodId();
            }
        });
    }

    /**
     * Generate a unique HOD ID
     */
    private static function generateUniqueHodId()
    {
        do {
            $hodId = strtoupper(Str::random(8));
        } while (self::where('hod_id', $hodId)->exists());

        return $hodId;
    }
}
