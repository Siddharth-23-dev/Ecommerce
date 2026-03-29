<form class="form-new-product form-style-1" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <fieldset class="name">
        <div class="body-title">Badge</div>
        <input class="flex-grow" type="text" name="badge" placeholder="Spring / Summer 2026" value="{{ old('badge', $banner->badge ?? '') }}">
    </fieldset>
    @error('badge') <span class="text-danger">{{ $message }}</span> @enderror

    <fieldset class="name">
        <div class="body-title">Title <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="text" name="title" placeholder="Banner title" value="{{ old('title', $banner->title ?? '') }}" required>
    </fieldset>
    @error('title') <span class="text-danger">{{ $message }}</span> @enderror

    <fieldset class="name">
        <div class="body-title">Description</div>
        <textarea class="flex-grow" name="description" rows="4" placeholder="Banner description">{{ old('description', $banner->description ?? '') }}</textarea>
    </fieldset>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror

    <div class="cols gap22">
        <fieldset class="name">
            <div class="body-title">Primary Button Text</div>
            <input class="flex-grow" type="text" name="primary_button_text" placeholder="Shop Collection" value="{{ old('primary_button_text', $banner->primary_button_text ?? '') }}">
        </fieldset>

        <fieldset class="name">
            <div class="body-title">Primary Button Link</div>
            <input class="flex-grow" type="text" name="primary_button_link" placeholder="/shop" value="{{ old('primary_button_link', $banner->primary_button_link ?? '') }}">
        </fieldset>
    </div>
    @error('primary_button_text') <span class="text-danger">{{ $message }}</span> @enderror
    @error('primary_button_link') <span class="text-danger">{{ $message }}</span> @enderror

    <div class="cols gap22">
        <fieldset class="name">
            <div class="body-title">Secondary Button Text</div>
            <input class="flex-grow" type="text" name="secondary_button_text" placeholder="Our Story" value="{{ old('secondary_button_text', $banner->secondary_button_text ?? '') }}">
        </fieldset>

        <fieldset class="name">
            <div class="body-title">Secondary Button Link</div>
            <input class="flex-grow" type="text" name="secondary_button_link" placeholder="/about" value="{{ old('secondary_button_link', $banner->secondary_button_link ?? '') }}">
        </fieldset>
    </div>
    @error('secondary_button_text') <span class="text-danger">{{ $message }}</span> @enderror
    @error('secondary_button_link') <span class="text-danger">{{ $message }}</span> @enderror

    <div class="cols gap22">
        <fieldset class="name">
            <div class="body-title">Note Label</div>
            <input class="flex-grow" type="text" name="note_label" placeholder="Editor's pick" value="{{ old('note_label', $banner->note_label ?? '') }}">
        </fieldset>

        <fieldset class="name">
            <div class="body-title">Note Text</div>
            <input class="flex-grow" type="text" name="note_text" placeholder="Tailored neutrals with everyday comfort." value="{{ old('note_text', $banner->note_text ?? '') }}">
        </fieldset>
    </div>
    @error('note_label') <span class="text-danger">{{ $message }}</span> @enderror
    @error('note_text') <span class="text-danger">{{ $message }}</span> @enderror

    <div class="cols gap22">
        <fieldset class="name">
            <div class="body-title">Sort Order</div>
            <input class="flex-grow" type="number" min="0" name="sort_order" value="{{ old('sort_order', $banner->sort_order ?? 0) }}">
        </fieldset>

        <fieldset class="name">
            <div class="body-title">Status</div>
            <label class="d-flex align-items-center gap-2 mt-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
                <span>Active</span>
            </label>
        </fieldset>
    </div>
    @error('sort_order') <span class="text-danger">{{ $message }}</span> @enderror
    @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror

    <fieldset>
        <div class="body-title">Banner Image</div>
        @if(!empty($banner?->image))
            <div class="mb-3">
                <img src="{{ asset('uploads/banners/' . $banner->image) }}" alt="{{ $banner->title }}" style="max-width: 240px; border-radius: 12px;">
            </div>
        @endif
        <div class="upload-image flex-grow">
            <div id="upload-file" class="item up-load">
                <label class="uploadfile" for="bannerImage">
                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                    <span class="body-text">Drop your image here or select <span class="tf-color">click to browse</span></span>
                    <input type="file" id="bannerImage" name="image" accept="image/*">
                </label>
            </div>
        </div>
    </fieldset>
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

    <div class="bot">
        <div></div>
        <button class="tf-button w208" type="submit">{{ $submitLabel }}</button>
    </div>
</form>
