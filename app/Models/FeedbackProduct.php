<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackProduct extends Model
{
    use HasFactory;

    protected $table = 'feedback_product';

    protected $fillable = ['user_id','name','product_id','point','feel','image'];

    public function Products(){
        return $this->hasMany("\App\Models\Product",'product_id');
    }
    public function Users(){
        return $this->belongsTo("\App\Models\User",'user_id');
    }
}
