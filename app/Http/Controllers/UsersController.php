<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(5);
        if (auth()->user()->level == 2) {
            return view('users.index', compact('user'));
        }
        else{
            return redirect('/home')->with('danger', 'Kamu tidak memiliki akses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $employe = Employees::all();
        if (auth()->user()->level == 2) {
            return view('users.create', compact('user','employe'));
        }
        else{
            return redirect('/home')->with('danger', 'Kamu tidak memiliki akses');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:250',
            'password' => 'required|max:250',
            'level'  => 'required',
            'employeId' => 'required'
        ]);
        $validated['password']=bcrypt($validated['password']);
        User::create($validated);

        return redirect('/users')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $employe = Employees::all();
        return view ('users.edit',compact('user','employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $users)
    {
        $validated = $request->validate([
            'username' => 'required|max:250',
            'password' => 'required|max:250',
            'level'  => 'required',
            'employeId' => 'required'
        ]);
        $validated['password']=bcrypt($validated['password']);
        User::where('id',$users)
            ->update($validated);

        return redirect('/users')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($users)
    {
        $data = User::find($users);
        $data->delete();
        return redirect('/users')->with('success', 'Data berhasil dihilangkan');
    }
}
