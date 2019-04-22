<?php

namespace App\Http\Controllers;

use App\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
   public function index()
    {
        $employes = Employe::paginate(10);

        return view('admin.employe.employes', ['employes' => $employes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employe.create');
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

            'firstname' => 'required',

            'lastname' => 'required',

            'email' => 'required|email|unique:users',


        ], [

            'firstname.required' => 'Name is required',

            'lastname.required' => 'Name is required',

            'email.required' => 'Email is required',


        ]);

        $employe = new Employe();
        $employe->firstname = $request->firstname;
        $employe->lastname = $request->lastname;
        $employe->email = $request->email;
        $employe->phone = $request->phone;
        $employe->company_id = $request->category;

        $employe->save();

        return redirect()->route('admin.employes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {

        return view('admin.employe.edit', ['employe' => $employe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        $request->validate([

            'firstname' => 'required',

            'lastname' => 'required',

            'email' => 'required',

            'phone' => 'required',

        ], [

            'firstname.required' => 'Name is required',

            'lastname.required' => 'Lastname is required',

            'email.required' => 'Email is required',

            'phone.required' => 'Phone is required',
            

        ]);


        $employe->firstname = $request->firstname;
        $employe->lastname = $request->lastname;
        $employe->email = $request->email;
        $employe->phone = $request->phone;
        $employe->company_id = $request->category;

        $employe->save();

        return redirect()->route('admin.employes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route('admin.employes.index');
    }
}
