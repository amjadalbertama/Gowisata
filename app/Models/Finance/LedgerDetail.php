<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerDetail extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ledger_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ledger_id',
        'ledger_date',
        'jurnal_refference',
        'debit',
        'credit',
        'created_at',
        'updated_at'
    ];
}
