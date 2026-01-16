<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    protected $fillable = [
        'title',
        'year',
        'status',
    ];

    public $timestamps = false; // table has no created_at / updated_at
}
