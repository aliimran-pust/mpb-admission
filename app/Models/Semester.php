<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';

    protected $fillable = [
        'semesterCode',
        'semesterName',
        'semesterYear',
        'specialNote',
        'applicationStart',
        'applicationEnd',
    ];

    public $timestamps = false; // table has no created_at, ask Imran vai
}
