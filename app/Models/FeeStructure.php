<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;

    protected $table = 'fee_structures';

    public $timestamps = false; // IMPORTANT

    protected $fillable = [
        'batch_id',
        'fee_category_id',
        'student_type',
        'amount',
        'effective_date',
    ];

    /* Relationships */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class);
    }
}
