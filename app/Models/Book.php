<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillabe =[
        
        'title',
        'author',
        'year',
        'pubisher',
        'city',
        'cover',
        'bookshelf_id',
    ];

    public function bookshelf(): BelongsTo{
        return $this->belongsTo(Bookshelf::class);
    }
    public static function getDataBooks(){
        $books = Book::all();
        $books_filter = [];

        foreach($books as $key => $book){
            $books_filter[$key]['no'] = $key+1;
            $books_filter[$key]['judul'] = $book['title'];
            $books_filter[$key]['penulis'] = $book['author'];
            $books_filter[$key]['tahun'] = $book['year'];
            $books_filter[$key]['penerbit'] = $book['publisher'];
        
        }
        return $books_filter;
    }
}
