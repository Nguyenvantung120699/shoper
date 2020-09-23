<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['categories_name','logo','description','is_active'];

    public function Products(){
        return $this->hasMany('App\Models\Product','category_id');
    }

    const ACTIVETRUE = 1;
    const ACTIVEFALSE = 0;
}
