<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['user_id','customer_name','shipping_address','telephone','grand_total','payment_method','customer_note','status'];

    const STATUS_PENDING = 0;
    const STATUS_CONFIRM = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SHIPPING = 3;
    const STATUS_START_SHIPPING = 4;
    const STATUS_COMPLETE = 5;
    const STATUS_CANCEL = 6;
}
