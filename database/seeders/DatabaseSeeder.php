<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();


        User::flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();



        User::factory()->count(100)->create();
        Category::factory()->count(100)->create();
        Product::factory()->count(500)->create()->each(
            function ($product) {
                $categories = Category::all()->random(mt_rand(1, 10))->pluck('id');
                $product->categories()->attach($categories);
                                });

        Transaction::factory()->count(100)->create();

    }
}
