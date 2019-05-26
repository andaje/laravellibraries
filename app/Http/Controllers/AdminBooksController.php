<?php

namespace App\Http\Controllers;
use App\Barcode;
use App\Photo;
use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('rentCount')->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $authors = Author::pluck('name','id')->all();
        return view('admin.books.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;


            $author = Author::firstOrCreate(['name' => request('author_name')]);

            $book =  Book::create(['title' => request('title'),'edition' => request('edition'),'year' => request('year'),'isbn' => request('isbn'), 'description' => request('description'),'photo_id' => $photo->id , 'author_id' => $author->id ]);
            //$barcod = Barcode::create(['book_id' => $book->id]);

           $barcod = Barcode::create(['book_id' => $book->id, 'book_title' => $book->title, 'book_isbn' => $book->isbn ]);
            $barcod->save();
            $test =Barcode::findOrFail($barcod->id);
            //dd($test);
            $book_item= $book->isbn . $barcod->id;
            $test->update(['book_item' => $book_item]);

        }
        //$author->books()->create($input);


        return redirect('/admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function edit($id)
    {
        //

        $book =Book::findOrFail($id);
        $authors = Author::pluck('name','id')->all();
        return view('admin.books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $book = Book::findOrFail($id);
        //$country = Country::firstOrCreate(['name' => request('country_name')]);
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $book = Book::findOrFail($id);
        $book->delete();
        unlink(public_path() . $book->photo->file);
        return redirect('/admin/books');
    }





    /*public function count($id)
    {
        //
        $books = Book::findOrFail($id);
        foreach ($books as $book) {
            foreach ($book->barcode as $barcod) {


                $barcode = Barcode::all();


                $result = Book ::where(Barcode::where(Rent::where('barcode_id', $barcod->id)->where('return_date', NULL)))->get()->count();
                dd($result);
                if ($result > 0) {

                    return 'Aviable';

                }else{
                }
                return 'Rented';
            }
            }*/






       /* if ($result > 0) {

            return 'Aviable';
        } else {

            return redirect('/admin/books');
        }*/




}
