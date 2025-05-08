<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    use HasFactory;
    protected $table= 'enquiries';
    protected $fillable= [
        'fullname',
        'email',
        'advertisement',
        'description',
    ];
}
