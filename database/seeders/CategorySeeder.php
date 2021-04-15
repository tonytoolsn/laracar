<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//use Category
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //清空
    Category::truncate();
    Category::create([
            'id' => 1,
            'title' => 'S1',
    ]);
     Category::create([
            'id' => 2,
            'title' => 'S2',
    ]);
    Category::create([
            'id' => 3,
            'title' => 'S3',
    ]);
    Category::create([
            'id' => 4,
            'title' => 'S4',
    ]);
    }
}
