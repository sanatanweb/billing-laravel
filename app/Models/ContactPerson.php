<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $table = 'contact_persons';
    protected $fillable = [
        'customer_id',
        'salutation',
        'first_name',
        'last_name',
        'mobile_number',
        'work_phone',
        'email_address'
    ];
}
