<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOffer extends Model
{
    protected $table = 'course_offers';

    protected $fillable = [
        'semester_id',
        'course_id',
        'section_id',
        'teacher_id',
        'class_room',
        'class_days',
        'class_time',
        'total_seat',
        'enrolled_seat',
        'offer_type',
        'status'
    ];

    public $timestamps = true;

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
