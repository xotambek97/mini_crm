<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);

        return view('admin.company.companies', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'image' => 'dimensions:min_width=100,min_height=100',

            'email' => 'required|email|unique:users'

        ], [

            'name.required' => 'Name is required',

            'email.required' => 'Email is required',

            'image.dimensions'=>'Image is minimum(100x100)'

        ]);

        $company = new Company();

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;


        $filenametostore = "";

        if ($request->hasFile('image')){
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $filename .'_' .time() .'.'. $extension;
            $request->file('image')->storeAs('storage/app/public', $filenametostore, 'public');

        }
        $company->image = $filenametostore;
        $company->save();

        return redirect()->route('admin.companies.index');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('admin.company.edit',['company'=>$company]);
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
        $request->validate([

            'name' => 'required',

            'image' => 'dimensions:min_width=100,min_height=100',

            'email' => 'required'

        ], [

            'name.required' => 'Name is required',

            'email.required' => 'Email is required',

            'image.dimensions'=>'Image is minimum(100x100)'

        ]);

        $company =Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;


        $filenametostore = "";

        if ($request->hasFile('image') && $request->image){
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('storage/app/public', $filenametostore, 'public');
            $company->image = $filenametostore;
        }

        $company->save();

        return redirect()->route('admin.companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.companies.index');
    }
}
