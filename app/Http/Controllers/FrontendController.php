<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $search = \Request::get('search');
        $barcodes = Barcode::leftJoin('books', 'books.id', '=', 'barcodes.book_id')
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->select('barcodes.*', 'authors.name', 'books.title', 'books.isbn', 'books.year', 'books.edition', 'books.description', 'books.photo_id')
            ->where('barcodes.available', "=", 1)
            ->where('books.title', 'like', '%' . $search . '%')->orWhere('authors.name', 'like', '%' . $search . '%')->orWhere('books.isbn', 'like', '%' . $search . '%')->orWhere('books.description', 'like', '%' . $search . '%')
            ->orderBy('id')
            ->paginate(7);
        return view('welcome', compact('barcodes'));
    }


    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $user_rentals = Rent::where('user_id', '=', $user_id)->where('return_date', '=', null)->count();
        if ($user_rentals < 7) {
            $test = Barcode::findOrFail($id);

            if ($test['available'] == 1) {
                $test['available'] = 0;
                $rental = [
                    'user_id' => Auth::id(),
                    'barcode_id' => $id,
                    'rental_start' => date("Y-m-d"),
                    'return_date' => Null,
                    'max_date' => date("Y-m-d", strtotime("+2 week"))

                ];

                Rent::create($rental);
                $test->update();
            } else {
                echo "you already rented max number of books";
            }
        }
        return redirect('/');
    }
    public function destroy($id)
    {
        //
    }

    public function myRentals()
    {
        $user = Auth::id();
        $rentals = Rent::where('user_id', '=', $user)->where('return_date', '=', null)->paginate(7);

        return view('rents', compact('rentals', 'user'));
    }

    public function history()
    {
        $user = Auth::id();

        $rentals = Rent::where('user_id', '=', $user)->where('return_date', '!=', null)->paginate(7);

        return view('history', compact('rentals', 'user'));
    }

    public function returnBook($id)
    {
        $barcode = Barcode::findOrFail($id);
        $rental = Rent::where("barcode_id", "$id")->where("return_date", null)->first();
        $barcode['available'] = 1;

        $rental['return_date'] = date("Y-m-d");

        $rental->update();
        $barcode->update();
        return redirect()->back();
    }


}
