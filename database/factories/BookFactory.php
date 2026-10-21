<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $faker = app(\Faker\Generator::class);

        return [
            'category_id'   => rand(1, 10),
            'book_code'     => rand(1100000, 8899999),
            'author'        => $faker->name,
            'title'         => $faker->sentence(5),
            'availability'  => rand(5, 25),
            'isbn_number'   => $faker->ean13(),
            'cover_image'   => 'https://placeit/200x300',
        ];
    }
}
