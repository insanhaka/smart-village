<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Categories extends Model
{
    protected $table = 'product_categories';

    protected $fillable = [
        'kategori_produk', 'business_id',
    ];

    public function business()
    {
        return $this->belongsTo('App\Business', 'business_id', 'id');
    }
}
