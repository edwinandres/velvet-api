<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Image::class;
    public function definition()
    {
        return [
            //
            //\Faker\Provider\Image::image(storage_path().'\app\public\users',200,200,'people',false)

            //'url'=>'articulos/'.$this->faker->image('public/storage/articulos', 640,480, null, false)
            'url'=> 'articulos/'.$this->faker->image( 'storage/app/public/articulos',640,480, null, false)
        ];
    }
}
