<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            ArticleSeeder::class,
        ]);

        // $article = Article::factory()->count(10)->create();

        // Article::create($article);
        
        User::factory()->create([
            'name' => 'Rionaldo Tio',
            'email' => 'rionaldo0567@gmail.com',
            'password' => bcrypt('rionaldo1'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Fedrick Pembunuh',
            'email' => 'fedrick@gmail.com',
            'password' => bcrypt('fedrick1'),
            'role' => 'aktivis'
        ]);

        User::factory()->create([
            'name' => 'Raymond Pencabut',
            'email' => 'raymond@gmail.com',
            'password' => bcrypt('raymond1')
        ]);
    }
}
