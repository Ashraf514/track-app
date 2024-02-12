<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeyInformation extends Model
{
    use HasFactory;
    protected $guarded  =   ["id"];
    protected $fillable =   ['product_id','title','description'];
}
