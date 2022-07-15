<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

        $categories =  Category::factory()->count(5)->create();

        User::factory()->count(100)->create()->each(function ($user) use ($categories) {
            $user->attachRole('user');

            Book::factory()->count(rand(1, 5))->create([
                'users_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);



//                ->each(function ($book) use ($categories) {
//                $book->category()->associate($categories->random());
//                $book->save();
//            });


//            $user->books()->saveMany(Book::factory()->count(5)->make());
        });
































    }
}
