<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(5)->create();
        News::factory()->count(4)->create();

        $this->call([
            AdminTableSeeder::class,
        ]);

    }
}
