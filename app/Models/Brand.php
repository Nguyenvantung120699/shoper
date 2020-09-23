<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    protected $fillable = ['brands_name','logo','history','is_active'];

    public function Products(){
        return $this->hasMany('App\Models\Product','brand_id');
    }
    const ACTIVETRUE = 1;
    const ACTIVEFALSE = 0;
}
