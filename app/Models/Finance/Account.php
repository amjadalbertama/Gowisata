<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'number',
        'description',
        'is_parent',
        'currency_code',
        'category',
        'category_id',
        'balance',
        'balance_amount',
        'parent_id',
        'parent',
        'custom_id',
        'tax_id',
        'tax_name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
