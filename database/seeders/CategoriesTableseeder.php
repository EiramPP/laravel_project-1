<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Drinks'],
            ['category_name' => 'Fish'],
            ['category_name' => 'Diwata'],
        ];
        DB::table('categories')->insert($categories);
    }
}
