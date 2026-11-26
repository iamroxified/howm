<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'bran_id',
        'bran_name',
        'bran_img',
        'bran_desc',
        'bran_loc',
        'bran_pst',
        'bran_pst_img',
        'bran_phone',
        'bran_email',
        'bran_stat',
    ];

    /**
     * Boot method to auto-generate bran_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->bran_id)) {
                $model->bran_id = self::generateUniqueBranId();
            }
        });
    }

    /**
     * Generate a unique branch ID
     */
    private static function generateUniqueBranId()
    {
        do {
            $branId = strtoupper(Str::random(8));
        } while (self::where('bran_id', $branId)->exists());

        return $branId;
    }
}
