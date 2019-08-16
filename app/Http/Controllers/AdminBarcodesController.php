<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarcodeRequest;
use Illuminate\Http\Request;
use App\Book;
use App\Barcode;



class AdminBarcodesController extends Controller
{
    public function index()
    {
        $barcodes = Barcode::paginate(7);
        return view('admin.barcodes.index', compact('barcodes'));
    }

    public function create()
    {
        $books = Book::pluck('title', 'id','isbn')->all();
        return view('admin.barcodes.create', compact('books'));
    }

    public function store(BarcodeRequest $request)
    {
        $i = $request->only('quantity');
        $i = (int)$i['quantity'];
        while ($i != 0) {
            $input = $request->only('book_id');
            Barcode::create($input);
            $last_bookItem = Barcode::orderBy('id', 'desc')->first();
            $input['book_item'] =  $last_bookItem->id;
            $last_bookItem->update($input);
            $i--;
        }
        return redirect('/admin/barcodes');
    }
    public function show($id)
    {
        $barcode = Barcode::findOrFail($id);
        return view('admin.barcodes.show', compact('barcode'));
    }
    public function edit($id)
    {
        $book =Book::findOrFail($id);
        return view('admin.barcodes.edit', compact('book'));

    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $barcode = Barcode::create(['book_id' => $book->id]);
        $barcode->save();
        $test =Barcode::findOrFail($barcode->id);
        //dd($test);
        $book_item=  $barcode->id;
        $test->update(['book_item' => $book_item]);
        return redirect('/admin/barcodes');
    }
    public function destroy($id)
    {
        $barcode = Barcode::findOrFail($id);
        $barcode->delete();

        return redirect('/admin/barcodes');
    }
}
