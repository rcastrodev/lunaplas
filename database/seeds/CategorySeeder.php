<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'VEHÍCULOS', 'color' => '#D8222A', 'image' => 'images/category/Mask_Group_283.png']);
        Category::create(['name' => 'NENAS', 'color' => '#EE972D', 'image' => 'images/category/Mask_Group_279.png']);
        Category::create(['name' => 'PRIMERA INFANCIA', 'color' => '#E5E431', 'image' => 'images/category/Mask_Group_280.png']);
        Category::create(['name' => 'BLOQUES', 'color' => '#8EBC23', 'image' => 'images/category/8901.png']);
        Category::create(['name' => 'JUEGOS CLÁSICOS', 'color' => '#1AA8C8', 'image' => 'images/category/Image_334.png']);
        Category::create(['name' => 'JUEGOS Y JUGUETES','color' => '#1179BA', 'image' => 'images/category/Mask_Group_284.png']);
        Category::create(['name' => 'PLAYA', 'color' => '#564394', 'image' => 'images/category/Image_335.png']);
    }
}
