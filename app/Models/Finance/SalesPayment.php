<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPayment extends Model
{
    use HasFactory;
    protected $connection = 'osposdb';
    protected $table = 'ospos_sales_payments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'payment_id',
        'sale_id',
        'payment_type',
        'payment_amount',
        'cash_refund',
        'employee_id',
        'payment_time',
        'reference_code'
    ];
}
