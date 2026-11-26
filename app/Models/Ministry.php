<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ministry extends Model
{
    use HasFactory;

    protected $table = 'ministry';

    protected $fillable = [
        'min_id',
        'min_name',
        'min_img',
        'min_desc',
        'min_lead',
        'min_vis',
        'min_mis',
        'min_link',
        'min_cat',
        'min_date',
        'min_stat',
        'min_loc',
    ];

    /**
     * Boot method to auto-generate min_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->min_id)) {
                $model->min_id = self::generateUniqueMinistryId();
            }
        });
    }

    /**
     * Generate a unique ministry ID
     */
    private static function generateUniqueMinistryId()
    {
        do {
            $minId = strtoupper(Str::random(8));
        } while (self::where('min_id', $minId)->exists());

        return $minId;
    }
}
