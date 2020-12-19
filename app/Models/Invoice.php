<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $prefix = 'INV-';
            $padLength = 7;
            $fiscalYear = '2077';
            $model->fiscal_year = $fiscalYear;
            $inv = self::where('fiscal_year', $fiscalYear)->orderBy('id','desc')->limit(1)->first();
            if ($inv) {
                $num = preg_replace('/[^0-9]/', '', $inv->invoice_unique_id);
            } else {
                $num = 0;
            }
            $num++;
            $model->invoice_unique_id = self::generateUniqueInvoiceID($num, $padLength, $prefix);
        });
    }

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

    public static function generateUniqueInvoiceID($num, $padLength, $prefix)
    {
        return $prefix.str_pad($num, $padLength, "0", STR_PAD_LEFT);
    }
}
