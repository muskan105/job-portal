<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'applicant_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
