<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model {
    use HasFactory;
    /**
     * Связь «один ко многим» таблицы `brands` с таблицей `products`
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

    /**
     * Возвращает список популярных брендов каталога товаров.
     * Следовало бы отобрать бренды, товары которых продаются
     * чаще всего. Но поскольку таких данных у нас еще нет,
     * просто получаем 5 брендов с наибольшим кол-вом товаров
     */
    public static function popular() {
        return self::withCount('products')->orderByDesc('products_count')->limit(5)->get();
    }
}
