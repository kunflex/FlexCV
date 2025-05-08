<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvExperience extends Model
{
    use HasFactory;
    protected $table = 'cv_experience';
    protected $fillable = [
        'cv_personal_details_id',
        'job_title',
        'company',
        'country',
        'city_town',
        'responsibilities',
        'start_date',
        'end_date',
    ];
}
