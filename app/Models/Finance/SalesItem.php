<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;
    protected $connection  = 'osposdb';
    protected $table = 'ospos_sales_items';

    protected $fillable = [
        'sale_id',
        'item_id',
        'description',
        'serialnumber',
        'line',
        'quantity_purchased',
        'item_cost_price',
        'item_unit_price',
        'discount',
        'discount_type',
        'item_location',
        'print_option'
    ];
}
