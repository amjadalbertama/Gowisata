<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    
    protected $table = 'data_companies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_company',
        'office_address',
        'office_email',
        'office_phone',
        'npwp_company',
        'approver_id',
    ];
}
