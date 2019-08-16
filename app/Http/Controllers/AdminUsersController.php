<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;

use App\Role;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminUsersController extends Controller
{

    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users', 'rente'));
    }
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UsersRequest $request)
    {
        $user = $request->all();
        $address = $request->only(['street', 'number','bus','city', 'postal_code', 'country']);
        $user['password']= Hash::make($request['password']);

        Address::create($address);
        $addres= DB::table('addresses')->orderBy('id', 'desc')->first();
        $user['address_id']=$addres->id;

        User::create($user);

        return redirect('/admin/users');
    }

    public function show($id)
    {
        //


    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        $address =Address::findOrFail($user->address_id);
        return view('admin.users.edit', compact('user','roles', 'address'));
    }
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request['password']);

        }
        $address = Address::findOrFail($user->address_id);
        //$input= $request->all();
        $addres = $request->only([ 'street', 'number', 'bus','city', 'postal_code', 'country']);
        $address->update($addres);
        $user->update($input);
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('deleted_user', 'The user is deleted');
        return redirect('/admin/users');
    }
}
