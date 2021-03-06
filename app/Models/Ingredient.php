<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['ingredient', 'category_id', 'last_order', 'stock',];

    public $timestamps = false;


    public function category()
    {
        return $this->belongsto(Category::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
