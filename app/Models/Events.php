<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Events extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table= 'events';
    protected $fillable = [
        'evn_id',
        'evn_title',
        'evn_img',
        'evn_desc',
        'evn_loc',
        'evn_start',
        'evn_end',
        'evn_time',
    ];

    /**
     * Boot method to auto-generate evn_id before creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->evn_id)) {
                $model->evn_id = self::generateUniquePrgId();
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
        } while (self::where('evn_id', $prgId)->exists());

        return $prgId;
    }

    /**
     * Get all registrations for this event
     */
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class, 'event_id', 'id');
    }
}
