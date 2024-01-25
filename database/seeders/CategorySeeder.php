<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->delete();
        Category::insert([
            [
                'name' => "Mobile Phone",
                'status'=>  true
            ],
            [
                'name' => "Tablet",
                'status'=>  true
            ],
            [
                'name' => "Smart Watch",
                'status'=>  true
            ]

        ]);
    }
}
