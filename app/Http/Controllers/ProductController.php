<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand'])
            ->when($request->filled('name'), function ($query) use ($request) {
                $search = (string) $request->string('name')->trim();

                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $product = new Product();
        $this->fillProduct($product, $validated, $request);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate($this->rules($product->id));

        $this->fillProduct($product, $validated, $request);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $this->deleteImage($product->image);
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    protected function rules(?int $productId = null): array
    {
        $uniqueSlug = 'unique:products,slug';

        if ($productId !== null) {
            $uniqueSlug .= ',' . $productId;
        }

        return [
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', $uniqueSlug],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'sku' => 'required|integer|min:0',
            'tax' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ];
    }

    protected function fillProduct(Product $product, array $validated, Request $request): void
    {
        $product->name = $validated['name'];
        $product->slug = Str::slug($validated['slug']);
        $product->price = $validated['price'];
        $product->discount = $validated['discount'] ?? 0;
        $product->sku = $validated['sku'];
        $product->tax = $validated['tax'] ?? 0;
        $product->category_id = $validated['category_id'];
        $product->brand_id = $validated['brand_id'];

        if ($request->hasFile('image')) {
            $this->deleteImage($product->image);

            $directory = public_path('uploads/products');

            if (! File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $imageName = time() . '_' . Str::random(8) . '.' . $request->file('image')->extension();
            $request->file('image')->move($directory, $imageName);

            $product->image = $imageName;
        }

        $product->save();
    }

    protected function deleteImage(?string $image): void
    {
        if (! $image) {
            return;
        }

        $path = public_path('uploads/products/' . $image);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
