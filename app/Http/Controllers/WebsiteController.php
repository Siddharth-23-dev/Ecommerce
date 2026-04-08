<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;

class WebsiteController extends Controller
{
    public function home()
    {
        $banners = collect();
        $featuredProducts = collect();
        $categories = collect();
        $categorySections = collect();

        try {
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

            if (Schema::hasTable('products')) {
                $featuredProducts = $this->decorateProducts(
                    Product::query()
                        ->with(['category', 'brand'])
                        ->latest()
                        ->take(8)
                        ->get()
                );
            }

            if (Schema::hasTable('categories')) {
                $categories = Category::query()
                    ->orderBy('name')
                    ->get()
                    ->map(function (Category $category) {
                        $category->image = $this->imageUrl($category->image, 'categories');

                        return $category;
                    });

                $categorySections = Category::query()
                    ->with(['brands', 'products.category', 'products.brand'])
                    ->orderBy('name')
                    ->get()
                    ->map(function (Category $category) {
                        $category->image = $this->imageUrl($category->image, 'categories');
                        $products = $this->decorateProducts(
                            $category->products
                                ->sortByDesc('id')
                                ->take(4)
                                ->values()
                        );

                        return [
                            'category' => $category,
                            'products' => $products,
                        ];
                    })
                    ->filter(function (array $section) {
                        return $section['products']->isNotEmpty();
                    })
                    ->values();
            }
        } catch (QueryException $exception) {
            $banners = collect();
            $featuredProducts = collect();
            $categories = collect();
            $categorySections = collect();
        }

        return view('website.index', compact('banners', 'featuredProducts', 'categories', 'categorySections'));
    }

    public function shop()
    {
        return view('website.shop');
    }

    public function product(string $slug)
    {
        $product = Product::query()
            ->with(['category', 'brand'])
            ->where('slug', $slug)
            ->firstOrFail();

        $product = $this->decorateProduct($product);

        $relatedProducts = $this->decorateProducts(
            Product::query()
                ->with(['category', 'brand'])
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->latest()
                ->take(4)
                ->get()
        );

        return view('website.product', compact('product', 'relatedProducts'));
    }

    private function decorateProducts($products)
    {
        $cartProductIds = auth()->check()
            ? Cart::where('user_id', auth()->id())->pluck('product_id')->all()
            : [];

        return $products->map(function (Product $product) use ($cartProductIds) {
            return $this->decorateProduct($product, $cartProductIds);
        });
    }

    private function decorateProduct(Product $product, array $cartProductIds = []): Product
    {
        $product->image = $this->imageUrl($product->image, 'products');
        $product->is_added_in_cart = in_array($product->id, $cartProductIds, true);

        if ($product->category) {
            $product->category->image = $this->imageUrl($product->category->image, 'categories');
        }

        if ($product->brand) {
            $product->brand->image = $this->imageUrl($product->brand->image, 'brands');
        }

        return $product;
    }

    private function imageUrl(?string $image, string $directory): ?string
    {
        if (! $image) {
            return null;
        }

        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
            return $image;
        }

        return asset('uploads/' . $directory . '/' . $image);
    }
}
