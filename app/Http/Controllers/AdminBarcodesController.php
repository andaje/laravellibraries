<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Rent;
use App\Barcode;

use App\Inventory;
use App\Photo;
use Illuminate\Http\Request;

class AdminBarcodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        //$bookItem = Barcode::groupBy('book_id')->count('id');
        //$inventories = Inventory::all();


        $barcodes = Barcode::has('rent')->get();
        return view('admin.barcodes.index', compact('barcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $book = Book::pluck('title','isbn');

        return view('admin.barcodes.create',compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        //

        $book = Book::where(['title' => request('book_title'), 'isbn' => request('book_isbn')])->first();
        $barcode = Barcode::create(['book_id' => $book->id]);
        $barcode->save();
        $test =Barcode::findOrFail($barcode->id);
        //dd($test);
        $book_item= $book->isbn . $barcode->id;
        $test->update(['book_item' => $book_item]);
        return redirect('/admin/barcodes');
    }



    /*public function barcode()
    {
        return view('barcode');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $barcode =Barcode::findOrFail($id);
        $book = Book::pluck('title','isbn');
        return view('admin.barcodes.edit', compact('book', 'barcode'));
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
        $barcode = Barcode::findOrFail($id);
        $book = Book::first(['title' => request('book_title'), 'isbn' => request('book_isbn')]);

        $barcode->update([ 'book_id' => $book->id]);

        return redirect('/admin/barcodes');
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

        $barcod = Barcode::findOrFail($id);//record uit database halen
        $barcod->delete();
        return redirect('/admin/barcodes');
    }



}
