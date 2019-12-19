<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Item extends Model
{
    protected $fillable =['category_id','name','description','price','image'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
