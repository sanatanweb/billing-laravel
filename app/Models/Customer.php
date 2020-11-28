<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_type',
        'salutation',
        'first_name',
        'last_name',
        'company_name',
        'customer_display_name',
        'mobile_number',
        'work_phone',
        'email_address',
        'website',
        'remarks'
    ];
}
