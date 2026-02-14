<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table = 'job_application';
    protected $fillable = [
        'job_display_id',
        'applicant_cv',
        'applicant_letter',
        'score', // optional
        'interview_status', // 'Scheduled', 'Completed', 'Rejected'
    ];

    public function job()
    {
        return $this->belongsTo(JobDisplay::class, 'job_display_id');
    }
}
