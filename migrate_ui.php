<?php

$sourceDir = 'c:\\laragon\\www\\Admin\\';
$destDir = __DIR__ . '/resources/views/admin/';

$mapping = [
    'products.html' => 'product/index.blade.php',
    'add-product.html' => 'product/create.blade.php',
    'brands.html' => 'brand/index.blade.php',
    'add-brand.html' => 'brand/create.blade.php',
    'categories.html' => 'category/index.blade.php', // Replaces previous index
    'add-category.html' => 'category/create.blade.php',
    'orders.html' => 'order/index.blade.php',
    'order-details.html' => 'order/details.blade.php',
    'order-tracking.html' => 'order/tracking.blade.php',
    'slider.html' => 'slider/index.blade.php',
    'add-slide.html' => 'slider/create.blade.php',
    'coupons.html' => 'coupon/index.blade.php',
    'add-coupon.html' => 'coupon/create.blade.php',
    'users.html' => 'user/index.blade.php',
    'settings.html' => 'settings/index.blade.php',
];

foreach ($mapping as $src => $dest) {
    if (!file_exists($sourceDir . $src)) {
        echo "Missing source: $src\n";
        continue;
    }
    
    $html = file_get_contents($sourceDir . $src);
    
    // Extract main content
    $start = strpos($html, '<div class="main-content-inner">');
    $end = strpos($html, '<div class="bottom-page">');
    
    if ($start === false || $end === false) {
        echo "Could not parse boundaries for $src\n";
        continue;
    }
    
    $content = substr($html, $start, $end - $start);
    
    // Fix image paths
    $content = preg_replace('/src="images\/([^"]+)"/', 'src="{{ asset(\'assets/admin/images/$1\') }}"', $content);
    
    $blade = "@extends('layouts.admin')\n\n@section('content')\n" . $content . "@endsection\n";
    
    $destPath = $destDir . $dest;
    $dir = dirname($destPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    file_put_contents($destPath, $blade);
    echo "Created: $dest\n";
}
