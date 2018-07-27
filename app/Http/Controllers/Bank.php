<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBank;

class Bank extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ModelBank::all();
        return view('dash/bank',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dash/bank_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new ModelBank();
        $data->bank_name = $request->name;
        $data->no_rek = $request->rek;
        $data->an = $request->an;
        $data->save();
        return redirect()->route('bank.index')->with('alert-success','Berhasil Menambahkan Data!');
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
        //
        $data = ModelBank::where('id',$id)->get();

        return view('dash/bank_edit',compact('data'));
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
        $data = ModelBank::where('id',$id)->first();
        $data->bank_name = $request->name;
        $data->no_rek = $request->rek;
        $data->an = $request->an;
        $data->save();
        return redirect()->route('bank.index')->with('alert-success','Data berhasil diubah!');
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
        $data = ModelBank::where('id',$id)->first();
        $data->delete();
        return redirect()->route('bank.index')->with('alert-success','Data berhasi dihapus!');
    }
}
