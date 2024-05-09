<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDisplay extends Model
{
    use HasFactory;
    protected $table = 'job_display';
    protected $fillable = [
        'posted_by',
        'job_title',
        'job_type',
        'company',
        'contact',
        'email',
        'location',
        'salary_range',
        'category',
        'application_instructions',
        'job_description',
        'deadline',
    ];
}
