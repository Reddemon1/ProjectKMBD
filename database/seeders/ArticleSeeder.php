<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Article::factory()->count(10)->create();
        for ($i=1; $i < 2; $i++) { 
            Article::create([
                'title' => 'Title '.$i,
                'image' => 'img/LogoKMBD.png',
                'content' => 'description '.$i,
                'date' => "2024-10-".$i,
                'writer' => "Name ".$i
            ]);
        }
    }
}
