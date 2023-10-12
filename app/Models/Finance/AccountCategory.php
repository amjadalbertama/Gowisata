<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'account_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'account_type_id',
        'name_bahasa',
        'created_at',
        'updated_at'
    ];
}
