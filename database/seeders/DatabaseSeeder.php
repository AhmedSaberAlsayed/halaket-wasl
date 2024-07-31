<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@halaketwasl.com',
            'password' =>  Hash::make('adminhalaket123'),
        ]);
        
        Category::factory()
        ->count(5)
        ->hasSupCategory(0)
        ->create();
        Category::factory()
        ->count(5)
        ->hasSupCategory(3)
        ->create();

        News::factory()
        ->count(100)
        ->create();
 

 


    }
}
