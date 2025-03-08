<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => "مقالات شركاء"
        ]);
        Category::create([
            'name' => " المقالات التعليمية"
        ]);
        Category::create([
            'name' => " اخبار الكريبتو"
        ]);
    }
}