<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //отображение списка категорий
    public function index() {
        $roots = Category::where('parent_id', 0)->get();
        return view('catalog.index', compact('roots'));
    }

    //отображение продуктов связанных с категорией
    public function category($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();
        return view('catalog.category', compact('category', 'products'));
    }

    //отображение брендов связанных с категорией
    public function brand($slug) {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $products = Product::where('brand_id', $brand->id)->get();
        return view('catalog.brand', compact('brand', 'products'));
    }


    //отображение информации о конкретном продукте
    public function product($slug) {
        $product = Product::select(
            'products.*',
            'categories.name as category_name',
            'categories.slug as category_slug',
            'brands.name as brand_name',
            'brands.slug as brand_slug'
        )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.slug', $slug)
            ->firstOrFail();
        return view('catalog.product', compact('product'));
    }
}
