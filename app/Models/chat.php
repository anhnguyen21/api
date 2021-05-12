<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    public $timestamps = false;
    protected $table="chat";
    protected $fillable = [
        'id','id_user','id_role','id_admin','id_shop','content','time'
    ];

    public function User()
    {
    return $this->hasOne(users::class,'id');
    }    
}
