<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\SupCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'title'=> $this->faker->title(),
            'content'=> $this->faker->text(20000),
            'image_path'=> '1713624472.png',
            'keyWords'=> $this->faker->name(),
            'timeReading'=> $this->faker->numerify(),
            'createdBy'=>'1',

            'categoryID'=>Category::all()->random(),
            'supCategoryID'=>SupCategory::all()->random(),







        ];
    }
}
