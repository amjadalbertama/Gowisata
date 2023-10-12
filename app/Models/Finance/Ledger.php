<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ledger';
    protected $primaryKey = 'id';
    protected $fillable = [
        'account_code',
        'account_name',
        'start_balance',
        'end_balance',
        'created_at',
        'updated_at'
    ];
}
