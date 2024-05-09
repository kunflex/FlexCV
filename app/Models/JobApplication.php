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
    ];
}
