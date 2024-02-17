<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticlesSeeder extends Seeder {


    public function run() {


        Articles::factory()->create([
            'name' => fake()->name(),
            'editor' => fake()->name(),
            'editor_id' => 1,
            'seourl' => Str::slug(fake()->name()),
            'description' => fake()->text(),
            'meta_title' => fake()->text(),
            'meta_description' => fake()->text(),
            'meta_keywords' => fake()->text(),
            'photo' =>  fake()->image('public/images/articles', 400, 300, null, false),
        ]);

    }

}
