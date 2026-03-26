<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'student_id',
        'project_cost',
        'amount_paid',
        'balance',
        'project_status',
        'supervisor_fee',
        'amt_paid_to_supervisor',
        'developer_fee',
        'amt_paid_to_developer',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
