<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded  =   ["id"];
    protected $fillable =   ['order_no','user_id','address_id','amount','order_type','additional_info','status'];
}
