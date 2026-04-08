<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SiteDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories
        $categories = [
            [
                'name' => 'Mushroom Powders',
                'slug' => 'mushroom-powders',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXPowderSlide1.png?v=1773404065'
            ],
            [
                'name' => 'Wellness Capsules',
                'slug' => 'wellness-capsules',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXCapsuleSlide1.png?v=1773404187'
            ],
            [
                'name' => 'Ayurvedic Resins',
                'slug' => 'ayurvedic-resins',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072'
            ],
            [
                'name' => 'Digestive Care',
                'slug' => 'digestive-care',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_KabzX_jpg.jpg?v=1772541393'
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 2. Brands
        $brands = [
            ['name' => 'Mushroomex', 'slug' => 'mushroomex', 'category_slug' => 'mushroom-powders'],
            ['name' => 'ShilajitX', 'slug' => 'shilajitx', 'category_slug' => 'ayurvedic-resins'],
            ['name' => 'MENZ-X', 'slug' => 'menz-x', 'category_slug' => 'wellness-capsules'],
            ['name' => 'LUCOX', 'slug' => 'lucox', 'category_slug' => 'wellness-capsules'],
            ['name' => 'KABZ-X', 'slug' => 'kabz-x', 'category_slug' => 'digestive-care'],
        ];

        foreach ($brands as $brandData) {
            $cat = Category::where('slug', $brandData['category_slug'])->first();
            Brand::updateOrCreate(
                ['slug' => $brandData['slug']],
                [
                    'name' => $brandData['name'],
                    'category_id' => $cat->id,
                    'image' => $cat->image // Placeholder or generic brand image
                ]
            );
        }

        // 3. Products
        $products = [
            [
                'name' => 'Mushroomex Weight Gainer',
                'slug' => 'mushroomex-weight-gainer',
                'price' => 1499,
                'discount' => 500,
                'sku' => 'MW-WG-01',
                'category_slug' => 'mushroom-powders',
                'brand_slug' => 'mushroomex',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/WhatsApp_Image_2026-02-21_at_11.51.50_AM.jpg?v=1771655525'
            ],
            [
                'name' => 'ShilajitX Gold Resin',
                'slug' => 'shilajitx-gold-resin',
                'price' => 2499,
                'discount' => 650,
                'sku' => 'MW-SR-02',
                'category_slug' => 'ayurvedic-resins',
                'brand_slug' => 'shilajitx',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072'
            ],
            [
                'name' => 'MENZ-X Performance Capsule',
                'slug' => 'menz-x-performance',
                'price' => 1850,
                'discount' => 450,
                'sku' => 'MW-MC-03',
                'category_slug' => 'wellness-capsules',
                'brand_slug' => 'menz-x',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXCapsuleSlide1.png?v=1773404187'
            ],
            [
                'name' => 'LUCOX Daily Vitality',
                'slug' => 'lucox-vitality',
                'price' => 1599,
                'discount' => 300,
                'sku' => 'MW-LC-04',
                'category_slug' => 'wellness-capsules',
                'brand_slug' => 'lucox',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/LucoXSlide1.png?v=1773920411'
            ],
            [
                'name' => 'KABZ-X Digestive Powder',
                'slug' => 'kabz-x-digestive',
                'price' => 899,
                'discount' => 200,
                'sku' => 'MW-KP-05',
                'category_slug' => 'digestive-care',
                'brand_slug' => 'kabz-x',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_KabzX_jpg.jpg?v=1772541393'
            ],
        ];

        foreach ($products as $prod) {
            $cat = Category::where('slug', $prod['category_slug'])->first();
            $brand = Brand::where('slug', $prod['brand_slug'])->first();
            
            Product::updateOrCreate(
                ['slug' => $prod['slug']],
                [
                    'name' => $prod['name'],
                    'price' => $prod['price'],
                    'discount' => $prod['discount'],
                    'sku' => $prod['sku'],
                    'category_id' => $cat->id,
                    'brand_id' => $brand->id,
                    'image' => $prod['image'],
                    'tax' => 18
                ]
            );
        }

        // 4. Banners
        Banner::updateOrCreate(
            ['title' => 'Nature\'s finest, crafted for your daily balance.'],
            [
                'badge' => 'Premium Wellness',
                'description' => 'Discover the healing power of medicinal mushrooms and ayurvedic herbs in our curated collection.',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXPowderSlide1.png?v=1773404065',
                'is_full_page' => true,
                'primary_button_text' => 'Shop Collection',
                'primary_button_link' => '/shop',
                'secondary_button_text' => 'Our Story',
                'secondary_button_link' => '/about',
                'note_label' => 'Quality Guaranteed',
                'note_text' => '100% Organic and Lab Tested',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        Banner::updateOrCreate(
            ['title' => 'Shilajit Gold: The Peak of Vitality.'],
            [
                'badge' => 'New Arrival',
                'description' => 'Pure Himalayan shilajit resin infused with 24k gold for ultimate performance and recovery.',
                'image' => 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072',
                'is_full_page' => false,
                'primary_button_text' => 'Learn More',
                'primary_button_link' => '/shop?category=ayurvedic-resins',
                'note_label' => 'Trending',
                'note_text' => 'Most popular wellness essential of 2026',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );
    }
}
