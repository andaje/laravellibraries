<?php

namespace App\Http\Controllers;
use App\Barcode;
use App\Photo;
use App\Author;
use App\Book;
use App\Rent;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    public function index()
    {   $books= Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::pluck('name','id')->all();
        return view('admin.books.create',compact('authors'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($file=$request->file('photo_id')){
            $name= time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }
        Book::create($input);
        return redirect('/admin/books');
    }

    public function show( $id)
    {
        $book =Book::findOrFail($id);
        return view('admin.books.index', compact('book', 'authors'));
    }

    public function edit($id)
    {
        $book =Book::findOrFail($id);
        $authors = Author::pluck('name','id')->all();
        return view('admin.books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $author = Author::firstOrCreate(['name' => request('author_name')]);
        $book->update(['title' => request('title'),'edition' => request('edition'),'year' => request('year'),'isbn' => request('isbn'),'description' => request('description'), 'author_id' => $author->id]);
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $book->update($input);

        return redirect('/admin/books');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        unlink(public_path() . $book->photo->file);
        return redirect('/admin/books');
    }

}
