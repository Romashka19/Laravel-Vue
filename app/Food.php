<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = "food";
    protected $fillable = ['type_id','name',"price","discription","image"];
}
