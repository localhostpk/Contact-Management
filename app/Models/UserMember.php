<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMember extends Model
{
     protected $fillable = [
        'city_admin_id',
        'user_id',
       
    ];
}
