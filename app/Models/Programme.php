<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Programme extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prg_id',
        'prg_title',
        'prg_cat',
        'prg_img',
        'prg_desc',
        'prg_loc',
        'prg_start',
        'prg_end',
        'prg_time',
    ];

    /**
     * Boot method to auto-generate prg_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->prg_id)) {
                $model->prg_id = self::generateUniquePrgId();
            }
        });
    }

    /**
     * Generate a unique programme ID
     */
    private static function generateUniquePrgId()
    {
        do {
            $prgId = strtoupper(Str::random(8));
        } while (self::where('prg_id', $prgId)->exists());

        return $prgId;
    }
}
