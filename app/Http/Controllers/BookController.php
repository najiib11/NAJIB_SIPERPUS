<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Storage;

class BookController extends Controller
{
    public function index(){
        $data['books'] = Book::all();
        return view('books.index',$data);
    }
    public function create(){
        $data['bookshelves'] = Bookshelf::pluck('name','id');
        return view('books.create',$data);
    }
    public function store(request $request){
        $validated = $request->validate([
        'title' => 'required |max :255',
        'author' => 'required |max :255',
        'year' => 'required |max :2077',
        'pubisher' => 'required |max :255',
        'city' => 'required |max :50',
        'cover' => 'required ',
        'bookshelf_id' => 'required |max :5',
        ]);
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storeAs(
                'public/cover_buku',
                'cover_buku_'.time() . '.' . $request->file('cover')->extension()
            );
            $validated['cover'] = basename($path);
        }
        $book = Book::create($validated);



        if($book){
            $notification[] = [
                'message' => 'data buku berhasil di simpan',
                'alert-type' => 'success'
            ];
        } else {
            $notification[] = [
                'message' => 'data buku berhasil di simpan',
                'alert-type' => 'error'
            ];
        }
        return redirect()->route('book')->with($notification);
    }
    public function edit(string $id){
        $data['book'] = Book::findOrFail($id);
        $data['bookshelves'] = Bookshelf::pluck("name", "id");
        return view("books.edit", $data);
    }
    public function update (Request $request,string $id){
        $book =Book::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required |max :255',
            'author' => 'required |max :255',
            'year' => 'required |max :2077',
            'pubisher' => 'required |max :255',
            'city' => 'required |max :50',
            'cover' => 'required ',
            'bookshelf_id' => 'required |max :5',
            ]);
            if ($request->hasFile('cover')) {
                if(book->cover !=null){
                    Storage::delete('public/cover_buku/');
                }
                $path = $request->file('cover')->storeAs(
                    'public/cover_buku',
                    'cover_buku_'.time() . '.' . $request->file('cover')->extension()
                );
                $validated['cover'] = basename($path);
            }

            $book ->update ($validated);
            if($book){
                $notification[] = [
                    'message' => 'data buku berhasil di simpan',
                    'alert-type' => 'success'
                ];
            } else {
                $notification[] = [
                    'message' => 'data buku berhasil di simpan',
                    'alert-type' => 'error'
                ];
            }
            return redirect()->route('book')->with($notification);
    }
    public function destroy(){
        $book =Book::findOrFail($id);
        Storage::delete('public/cover_buku/'.$book->cover);
        $book->delete();
        $notification[] =array(
             'message' => 'data buku berhasil di simpan',
                    'alert-type' => 'error'
        );
        return redirect()->route('book')->with($notification);
    }


}


