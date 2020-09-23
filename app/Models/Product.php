<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable =['product_name','product_description','thumbnail','gallery','category_id','brand_id','color','size','classify','price','quantity','is_active'];

    public function Category(){
        return $this->belongsTo("App\Models\Category","category_id");
    }

    public function Brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public function Cart(){
        return $this->belongsTo('App\Models\Cart');
    }

    public function OrderProduct(){
        return $this->belongsTo('App\Models\OrderProduct','product_id');
    }
    public function getPrice(){
        return number_format($this->price,0,',','.');
    }

    const ACTIVETRUE = 1;
    const ACTIVEFALSE = 0;
}
