<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvReference extends Model
{
    use HasFactory;
    protected $table = 'cv_references';
    protected $fillable = [
        'cv_personal_details_id',
        'fullname',
        'position',
        'country',
        'company',
        'email',
        'telephone',
    ];
}
