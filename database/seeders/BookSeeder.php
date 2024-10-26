<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
          
           "title" => "Jarkom-Filosofi",
           "author" =>"ATG",
           "year" =>2024,
           "publisher" =>"UNSUR",
           "city"=>"Cianjur",
            "cover"=>2024,
           "bookshelf_id" => 1
     
        ]);
    }
}
