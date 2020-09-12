<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';

    protected $fillable = [
        'nama_usaha', 'is_active',
    ];

    public function product_categories()
    {
        return $this->hasMany('App\Product_Categories', 'business_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Products', 'business_id', 'id');
    }
}
