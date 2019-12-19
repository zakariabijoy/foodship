<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Category extends Model
{
    protected $fillable=['name','slug'];



    public function items(){
        return $this->hasMany(Item::class);
    }
}
