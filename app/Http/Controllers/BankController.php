<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();

        return view('index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //alert("Hi");
        $bank = new Bank([
            'name' => $request->get('name'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $bank->save();
        return redirect('/banks');
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
        $bank = Bank::find($id);
        return view('edit', compact('bank')); 
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
        $bank = Bank::find($id);
        $bank->name =  $request->get('name');
        $bank->city = $request->get('city');
        $bank->country = $request->get('country');
        $bank->save();

        return redirect('/banks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();

        return redirect('/banks');
    }
}
