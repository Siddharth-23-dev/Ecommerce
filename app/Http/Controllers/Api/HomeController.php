<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index(): JsonResponse
    {
        $products = collect();
        $categories = collect();
        $brands = collect();
        $banners = collect();

        if (Schema::hasTable('products')) {
            $products = Product::query()
                ->select([
                    'id',
                    'name',
                    'slug',
                    'image',
                    'price',
                    'discount',
                    'sku',
                    'tax',
                    'category_id',
                    'brand_id',
                    'created_at',
                ])
                ->with([
                    'category:id,name,slug,image',
                    'brand:id,name,slug,image,category_id',
                ])
                ->latest()
                ->get()
                ->map(function (Product $product) {
                    $product->image = $this->imageUrl($product->image, 'products');

                    if ($product->category) {
                        $product->category->image = $this->imageUrl($product->category->image, 'categories');
                    }

                    if ($product->brand) {
                        $product->brand->image = $this->imageUrl($product->brand->image, 'brands');
                    }

                    return $product;
                });
        }

        if (Schema::hasTable('categories')) {
            $categories = Category::query()
                ->select(['id', 'name', 'slug', 'image'])
                ->orderBy('name')
                ->get()
                ->map(function (Category $category) {
                    $category->image = $this->imageUrl($category->image, 'categories');

                    return $category;
                });
        }

        if (Schema::hasTable('brands')) {
            $brands = Brand::query()
                ->select(['id', 'name', 'slug', 'image', 'category_id'])
                ->with('category:id,name,slug,image')
                ->orderBy('name')
                ->get()
                ->map(function (Brand $brand) {
                    $brand->image = $this->imageUrl($brand->image, 'brands');

                    if ($brand->category) {
                        $brand->category->image = $this->imageUrl($brand->category->image, 'categories');
                    }

                    return $brand;
                });
        }

        if (Schema::hasTable('banners')) {
            $banners = Banner::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('id')
                ->get()
                ->map(function (Banner $banner) {
                    $banner->image = $this->imageUrl($banner->image, 'banners');

                    return $banner;
                });
        }

        return response()->json([
            'status' => true,
            'data' => [
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands,
                'banners' => $banners,
            ],
        ]);
    }

    private function imageUrl(?string $image, string $directory): ?string
    {
        if (! $image) {
            return null;
        }

        return asset('uploads/' . $directory . '/' . $image);
    }
}
