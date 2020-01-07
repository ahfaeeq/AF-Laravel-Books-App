<?php

use Illuminate\Database\Seeder;
use App\Books;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksCount = 30;
        factory(Books::class, $booksCount)->create();
    }
}
