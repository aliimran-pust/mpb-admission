<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_name',
        'address',
        'mobile',
        'email',
        'occupation',
        'specialization',
        'membership_type',
        'award_years',
        'award_type',
        'csc_ref',
        'host_institution',
        'academic_program',
        'payment_receipt_copy',
        'transaction_id'
    ];
}
