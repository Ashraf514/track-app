<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded  =   ["id"];
    protected $fillable =   ['category_id','title','brand','description','price'];

    /**
     * Get all of the productKeyInformation for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productKeyInformation(): HasMany
    {
        return $this->hasMany(ProductKeyInformation::class, 'product_id');
    }
}
