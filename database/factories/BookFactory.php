<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $authors = ['John Doe', 'Jane Smith', 'Alan Turing', 'Ada Lovelace', 'Robert Martin', 'Martin Fowler'];
        $titles = [
            'Introduction to Algorithms',
            'Clean Code Principles',
            'Database Design Essentials',
            'Web Development Handbook',
            'Advanced Artificial Intelligence',
            'Software Architecture Guide'
        ];

        return [
            'category_id'   => rand(1, 10),
            'book_code'     => rand(1100000, 8899999),
            'author'        => $authors[array_rand($authors)],
            'title'         => $titles[array_rand($titles)] . ' ' . rand(1, 500),
            'availability'  => rand(5, 25),
            'isbn_number'   => '978' . rand(1000000000, 9999999999),
            'cover_image'   => 'https://placeit/200x300',
        ];
    }
}
