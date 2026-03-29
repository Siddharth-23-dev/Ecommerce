<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()
            ->select(['id', 'name', 'slug', 'image', 'category_id'])
            ->with([
                'category:id,name,slug,image',
                'products' => function ($query) {
                    $query->select(['id', 'name', 'slug', 'image', 'price', 'discount', 'brand_id', 'category_id'])
                        ->with('category:id,name,slug')
                        ->latest();
                },
            ])
            ->orderBy('name')
            ->get();

        $brands->each(function (Brand $brand) {
            $brand->setRelation('products', $brand->products->take(4)->values());
        });

        return response()->json($brands);
    }
}
