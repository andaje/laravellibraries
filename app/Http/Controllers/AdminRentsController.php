<?php

namespace App\Http\Controllers;

use App\Barcode;

use App\Rent;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AdminRentsController extends Controller
{
    public function index()
    {

        $rents = Rent::paginate(10);
        return view('admin.rents.index', compact('rents'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }


    public function update($id)
    {
        $test = Barcode::findOrFail($id);

        if ($test['available'] == 1) {
            //stock part
            $test['available'] = 0;

            //rental part
            $rental = [
                'user_id' => Auth::id(),
                'barcode_id' => $id,
                'rental_start' => date("Y-m-d"),
                'reutrn_date' => Null,
                'max_date' => date("Y-m-d", strtotime("+2 week")),
            ];

            Rent::create($rental);
            $test->update();
        } else {
            $rental = Rent::where("barcode_id", "$id")->first();
            $test['available'] = 1;

            $rental['return_date'] = date("Y-m-d");

            $rental->update();
            $test->update();

        }

        return redirect('admin/barcodes');

    }




    public function destroy($id)
    {
        $rent = Rent::findOrFail($id);
        $rent->delete();
        return redirect('/admin/rents');
    }
}
