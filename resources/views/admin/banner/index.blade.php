@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Banners</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Banners</div></li>
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div>
                    <p class="body-text">Manage homepage Bootstrap banner slides.</p>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.banners.create') }}">
                    <i class="icon-plus"></i>Add new
                </a>
            </div>

            <div class="wg-table table-all-user">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Banner</th>
                            <th>Buttons</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                                <td class="pname">
                                    <div class="image">
                                        <img src="{{ $banner->image ? asset('uploads/banners/' . $banner->image) : asset('assets/admin/images/products/17.png') }}" alt="{{ $banner->title }}" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="body-title-2">{{ $banner->title }}</a>
                                        @if($banner->badge)
                                            <div class="text-tiny">{{ $banner->badge }}</div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $banner->primary_button_text ?: '-' }}</div>
                                    <div class="text-tiny">{{ $banner->secondary_button_text ?: '-' }}</div>
                                </td>
                                <td>{{ $banner->sort_order }}</td>
                                <td>
                                    <span class="badge {{ $banner->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $banner->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}">
                                            <div class="item edit"><i class="icon-edit-3"></i></div>
                                        </a>
                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Delete this banner?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item text-danger delete" style="border: none; background: transparent; padding: 0;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No banners created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $banners->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
