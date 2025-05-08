<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvAdditionalDetails extends Model
{
    use HasFactory;
    protected $table = 'cv_additional_details';
    protected $fillable = [
        'cv_personal_details_id',
        'other_details',
    ];


    
}
