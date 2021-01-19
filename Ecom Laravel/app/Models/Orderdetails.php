<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_details_id';

    protected $fillable = [
            'order_id',
            'prodcut_id',
            'product_qty',
            'product_price',
    ];
}
