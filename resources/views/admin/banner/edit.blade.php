@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit Banner</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('admin.banners.index') }}"><div class="text-tiny">Banners</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit Banner</div></li>
            </ul>
        </div>

        <div class="wg-box">
            @include('admin.banner.partials.form', [
                'action' => route('admin.banners.update', $banner->id),
                'method' => 'PUT',
                'banner' => $banner,
                'submitLabel' => 'Update Banner',
            ])
        </div>
    </div>
</div>
@endsection
