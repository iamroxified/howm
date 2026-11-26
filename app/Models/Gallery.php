<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'gal_id',
        'gal_name',
        'gal_img',
        'gal_desc',
        'gal_cat',
        'gal_date',
        'gal_stat',
    ];

    protected $casts = [
        'gal_img' => 'array',
    ];

    /**
     * Boot method to auto-generate gal_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->gal_id)) {
                $model->gal_id = self::generateUniqueGalId();
            }
        });
    }

    /**
     * Generate a unique gal_id
     */
    private static function generateUniqueGalId()
    {
        $gal_id = Str::random(8);
        while (self::where('gal_id', $gal_id)->exists()) {
            $gal_id = Str::random(8);
        }
        return strtoupper($gal_id);
    }
}
