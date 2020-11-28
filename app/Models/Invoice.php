<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_unique_id',
        'customer_id',
        'invoice_date',
        'fiscal_year',
        'subtotal',
        'vat_amount',
        'total_amount',
        'amount_in_words',
        'received_by',
        'status'
    ];
}
