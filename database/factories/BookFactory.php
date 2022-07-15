<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(  )
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPicsumImagesProvider($faker));

        return [


            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'image' => $filePath = $faker->image($dir = 'public/storage/images',  640,  480,),
            'pdf' =>$this->faker->file($sourceDir = 'public/storage/pdf',$targetDir = 'public/storage/targetPDF'),
            'slug' => $this->faker->slug,
        ];
    }
}
