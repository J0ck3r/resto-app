<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'description', 'location', 'user_id'];
/*
public function users()
{
     return $this->belongsToMany(User::class, 'restaurant_user');
}
*/
public function menus()
{
     return $this->hasMany(Menu::class);
}

public function reservations()
    {
        return $this->hasMany(Table::class);
    }

    public function categos()
{
     return $this->belongsToMany(Category::class, 'restaurant_category');
}

}