<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Table name

    protected $fillable = [
        'email',
        'password',
        'status',
        'account_type',
        'last_login',
    ];
}
