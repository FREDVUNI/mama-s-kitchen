<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table ="items";

    protected $guarded =[];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
