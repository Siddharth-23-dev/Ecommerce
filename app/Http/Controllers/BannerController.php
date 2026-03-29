<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class BannerController extends Controller
{
    public function index()
    {
        if (! $this->bannerTableExists()) {
            $banners = new LengthAwarePaginator([], 0, 10);

            return view('admin.banner.index', compact('banners'))
                ->with('error', 'Banners table not found. Run the banner migration first.');
        }

        $banners = Banner::orderBy('sort_order')->orderByDesc('id')->paginate(10);

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        if (! $this->bannerTableExists()) {
            return redirect()->route('admin.banners.index')
                ->with('error', 'Banners table not found. Run the banner migration first.');
        }

        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        if (! $this->bannerTableExists()) {
            return redirect()->route('admin.banners.index')
                ->with('error', 'Banners table not found. Run the banner migration first.');
        }

        $data = $this->validatedData($request);
        $data['image'] = $this->uploadImage($request);

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(string $id)
    {
        if (! $this->bannerTableExists()) {
            return redirect()->route('admin.banners.index')
                ->with('error', 'Banners table not found. Run the banner migration first.');
        }

        $banner = Banner::findOrFail($id);

        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        if (! $this->bannerTableExists()) {
            return redirect()->route('admin.banners.index')
                ->with('error', 'Banners table not found. Run the banner migration first.');
        }

        $banner = Banner::findOrFail($id);
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($banner->image);
            $data['image'] = $this->uploadImage($request);
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(string $id)
    {
        if (! $this->bannerTableExists()) {
            return redirect()->route('admin.banners.index')
                ->with('error', 'Banners table not found. Run the banner migration first.');
        }

        $banner = Banner::findOrFail($id);

        $this->deleteImage($banner->image);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }

    protected function validatedData(Request $request): array
    {
        $data = $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'primary_button_text' => 'nullable|string|max:100',
            'primary_button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_link' => 'nullable|string|max:255',
            'note_label' => 'nullable|string|max:100',
            'note_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }

    protected function uploadImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/banners');

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $imageName);

        return $imageName;
    }

    protected function deleteImage(?string $image): void
    {
        if (! $image) {
            return;
        }

        $path = public_path('uploads/banners/' . $image);

        if (File::exists($path)) {
            File::delete($path);
        }
    }

    protected function bannerTableExists(): bool
    {
        return Schema::hasTable('banners');
    }
}
