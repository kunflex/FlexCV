<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvPersonalDetails extends Model
{
    use HasFactory;
    protected $table = 'cv_personal_details';
    protected $fillable = [
        'picture', 
        'firstname', 
        'othername', 
        'lastname', 
        'email', 
        'phone_number', 
        'address', 
        'country', 
        'city_town', 
        'DOB',
        'skills',
        'summary',
    ];
}    
