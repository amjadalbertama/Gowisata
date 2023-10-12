<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ospos_sales_jurnal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jurnal_date',
        'description',
        'account_id',
        'debit',
        'credit',
        'trans_reference',
        'created_at',
        'updated_at'
    ];
}
