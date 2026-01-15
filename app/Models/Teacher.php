<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'bio',
        'facebook',
        'whatsapp',
        'linkedin',
        'youtube',
        'status',
        'view_order'
    ];
}
