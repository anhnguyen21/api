<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table="users";
    protected $fillable = [
        'id','account','firstName','lastName','email','phone','gender','address','password','birthday','img','remember_token','created_at', 'updated_at'
    ];
}
