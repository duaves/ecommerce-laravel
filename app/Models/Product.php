<?php

namespace App\Models;



use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model {
    use HasFactory;
    /**
     * Связь «товар принадлежит» таблицы `products` с таблицей `categories`
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Связь «товар принадлежит» таблицы `products` с таблицей `brands`
     */
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Связь «многие ко многим» таблицы `products` с таблицей `baskets`
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }

    public function likes(){
        return $this->belongsToMany(Like::class)->withPivot('quantity');
    }
}
