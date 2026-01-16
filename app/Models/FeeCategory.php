<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    protected $table = 'fee_categories';

    protected $fillable = [
        'name',
        'type',
        'status',
    ];

    public $timestamps = false;
}
