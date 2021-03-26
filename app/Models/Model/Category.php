<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function postCount(){

        return $this->hasMany('App\Models\Model\Post','category_id','id')->count();
    }
}
