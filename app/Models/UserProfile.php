<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';

    protected $fillable =['user_id','first_name','last_name','telephone','birthday','gender','address','avatar'];

    public function usern(){
        return $this->belongsTo("App\User","users_id",);
    }
    
    const MALE = 1;
    const FEMALE = 2;
    const OTHER = 3;
}
