<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainCategoryImages = [
            ['id' => 1, 'src' => '/images/category/notebook.webp'],
            ['id' => 2, 'src' => '/images/category/smartphone.webp'],
            ['id' => 3, 'src' => '/images/category/tv.webp'],
            ['id' => 4, 'src' => '/images/category/monitor.webp'],
        ];

        $mainProductImages = [
            ['id' => 5, 'src' => '/images/product/5.webp'],
            ['id' => 6, 'src' => '/images/product/6.webp'],
            ['id' => 7, 'src' => '/images/product/7.webp'],
            ['id' => 8, 'src' => '/images/product/8.webp'],
            ['id' => 9, 'src' => '/images/product/9.webp'],
            ['id' => 10, 'src' => '/images/product/10.webp'],
            ['id' => 11, 'src' => '/images/product/11.webp'],
        ];

        $mainBrands = [
            ['id' => 12, 'src' => '/images/brand/huawei.webp'],
        ];

        $mainCategoryImages[] = ['id' => 13, 'src' => '/images/category/computer_components.webp'];
        $mainCategoryImages[] = ['id' => 14, 'src' => '/images/category/videocard.webp'];

        $mainBrands[] = ['id' => 15, 'src' => '/images/brand/palit.png'];

        $mainProductImages = array_merge($mainProductImages , [
            ['id' => 16, 'src' => '/images/product/12.webp'],
            ['id' => 17, 'src' => '/images/product/13.webp'],
            ['id' => 18, 'src' => '/images/product/14.webp'],
            ['id' => 19, 'src' => '/images/product/15.webp'],
            ['id' => 20, 'src' => '/images/product/16.webp'],
        ]);

        Images::insert($mainCategoryImages);
        Images::insert($mainProductImages);
        Images::insert($mainBrands);
    }
}
