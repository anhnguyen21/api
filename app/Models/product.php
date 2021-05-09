<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class product extends Model
{
    protected $table="product";
    public function order()
    {
        return $this->hasMany("App\Models\order","id_product","id");
    }
}
