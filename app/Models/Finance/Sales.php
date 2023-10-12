<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $connection  = 'osposdb';
    protected $table = 'ospos_sales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sale_time',
        'customer_id',
        'employee_id',
        'comment',
        'invoice_number',
        'quote_number',
        'sale_status',
        'dinner_table_id',
        'work_order_number',
        'sale_type',
        'sale_info',
        'member_id'
    ];
}
