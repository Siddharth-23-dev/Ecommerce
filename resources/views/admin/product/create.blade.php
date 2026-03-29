@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}">
                        <div class="text-tiny">Products</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Add Product</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-new-product form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
                @csrf

                <fieldset class="name">
                    <div class="body-title">Product Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Product name" name="name" value="{{ old('name') }}" required>
                </fieldset>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">Product Slug <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Product slug" name="slug" value="{{ old('slug') }}" required>
                </fieldset>
                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">Category <span class="tf-color-1">*</span></div>
                    <select class="flex-grow" name="category_id" required>
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ (string) old('category_id') === (string) $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">Brand <span class="tf-color-1">*</span></div>
                    <select class="flex-grow" name="brand_id" required>
                        <option value="">Choose Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ (string) old('brand_id') === (string) $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
                @error('brand_id') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">Price <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="number" step="0.01" min="0" placeholder="0.00" name="price" value="{{ old('price') }}" required>
                </fieldset>
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">Discount</div>
                    <input class="flex-grow" type="number" step="0.01" min="0" placeholder="0.00" name="discount" value="{{ old('discount') }}">
                </fieldset>
                @error('discount') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">SKU <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="number" min="0" placeholder="Enter SKU" name="sku" value="{{ old('sku') }}" required>
                </fieldset>
                @error('sku') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset class="name">
                    <div class="body-title">Tax</div>
                    <input class="flex-grow" type="number" step="0.01" min="0" placeholder="0.00" name="tax" value="{{ old('tax') }}">
                </fieldset>
                @error('tax') <span class="text-danger">{{ $message }}</span> @enderror

                <fieldset>
                    <div class="body-title">Upload image</div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
