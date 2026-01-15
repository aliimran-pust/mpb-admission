<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'program_course'; // table name

    protected $fillable = [
        'department_id',
        'program_id',
        'course_name',
        'course_type',
        'course_prefix',
        'course_code',
        'course_year',
        'course_semester',
        'course_credit',
        'total_marks',
        'course_outline',
        'is_active',
        'status',
        'created_by',
        'created_ip',
        'created_time',
        'updated_by',
        'updated_ip',
        'updated_time',
    ];

    public $timestamps = false; // since created_time / updated_time are custom columns
}
