<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'image', 'restaurant_id'];

public function categories()
{
     return $this->belongsToMany(Category::class, 'category_menu');
}

public function restaurants()
{
     return $this->belongsTo(Restaurant::class);
}

}
