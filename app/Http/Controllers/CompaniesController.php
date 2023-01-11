<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Companies::paginate(5);
        return view('companies.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'logo'  => 'required|image|file|max:2048|mimes:png',
            'website' => 'required'
        ]);

        $validated['logo']=$request->file('logo')->store('logo');
        Companies::create($validated);

        return redirect('/companies')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::find($id);
        return view ('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companies)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo'  => 'required|image|file|max:2048|mimes:png',
            'website' => 'required'
        ]);

        $existingImage = Companies::find($companies)->logo;
        Storage::delete('public/logo/' . $existingImage);

        $validated['logo']=$request->file('logo')->store('logo');
        Companies::where('id', $companies)
            ->update($validated);

        return redirect('/companies')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($companies)
    {
        $data = Companies::find($companies);
        $data->delete();
        $existingImage = Companies::find($companies)->logo;
        Storage::delete('public/logo/' . $existingImage);
        return redirect('/companies')->with('success', 'Data berhasil dihilangkan');
    }
}
