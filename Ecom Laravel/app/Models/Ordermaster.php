<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordermaster extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
            'order_date',
            'order_status',
            'user_id',
    ];
}
