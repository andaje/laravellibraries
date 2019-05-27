<?php

namespace App\Http\Controllers;

use App\Barcode;
use App\Book;
use App\Inventory;
use App\Rent;
use App\User;
use Illuminate\Http\Request;
use DateTime;
//use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminRentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $date=Carbon::now();

        //

        //$rents = Rent::where('return_date', NULL)->get();
        $rents = Rent::all();
        return view('admin.rents.index', compact('rents', 'date'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('last_name', 'id');
        //$inventories = Inventory::pluck('barcode_id', 'id');
        $barcodes = Barcode::pluck('book_item', 'id');

        return view('admin.rents.create', compact('users', 'barcodes'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::where(['first_name' => request('user_first_name'), 'last_name' => request('user_last_name')])->first();

        $barcode = Barcode:: where(['book_item' => request('rental_book_item')])->first();
        //$inventory = Inventory::create(['barcode_id' => $barcode->id]);
        Rent::create(['rental_date' => request('rental_date'), 'return_date' => request('return_date'), 'user_id' => $user->id, 'barcode_id' => $barcode->id]);
        $result = Rent::where('user_id', $user->id)->where('return_date', NULL)->count();
        //dd($result);
        if ($result > 7) {

            return 'user_rent_max_book';
        } else {

            return redirect('/admin/rents');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rent = Rent::findOrFail($id);
        $users = User::pluck('first_name', 'last_name', 'id');
        $inventory = Inventory:: pluck('barcode_id', 'id');
        return view('admin.rents.edit', compact('rent', 'users', 'inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rent = Rent::findOrFail($id);


        $rent->update(['rental_date' => request('rental_date'), 'return_date' => request('return_date')]);
        //dd($rent->rental_date);

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rent->rental_date);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rent->return_date);
        $diff_in_days = $to->diffInDays($from);
        //dd($diff_in_days);

        if ($diff_in_days > 14) {

            $message = 'je moet een boete krijgen';
        } else {

            $message = 'success';

        }

            return redirect('/admin/rents')->with('message', $message);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rent = Rent::findOrFail($id);//record uit database halen
        $rent->delete();
        return redirect('/admin/rents');
    }
}
