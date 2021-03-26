<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function getCategory(){
        return    $this->hasOne('App\Models\Model\Category','id','category_id');

    }
}
