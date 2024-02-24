<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Article;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            Article::create([
                'title' => Str::random(5),
                'content' => Str::random(20),
                'author' => Str::random(3),
                'date' => Carbon::today(),
                'category' => 'Kucing' 
            ]);
        }
    }
}
