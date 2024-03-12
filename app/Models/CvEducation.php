<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvEducation extends Model
{
    use HasFactory;
    protected $table = 'cv_education';
    protected $fillable = [
        'cv_personal_details_id',
        'institution',
        'certification',
        'field_of_study',
        'location',
        'start_date',
        'end_date',
    ];

}
