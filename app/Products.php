<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'stok', 'foto', 'product_categories_id', 'business_id',
    ];
}
