<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory {

    public function definition() {


        return [
            'name' => fake()->name(),
            'editor' => fake()->name(),
            'editor_id' => 1,
            'seourl' => Str::slug(fake()->name()),
            'description' => fake()->text(),
            'meta_title' => fake()->text(),
            'meta_description' => fake()->text(),
            'meta_keywords' => fake()->text(),
            'photo' =>  fake()->image(),
        ];



    }
}
