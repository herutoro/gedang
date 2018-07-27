<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelProduct;
use App\ModelCategories;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = ModelProduct::with('categories')->orderBy('created_at', 'DESC')->paginate(10);
        return view('dash/product',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ModelCategories::orderBy('categories_name', 'ASC')->get();
        return view('dash/product_create' ,compact('categories'));
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
        $data = new ModelProduct();
        $data->product_name = $request->input('name');
        $data->categories_id = $request->input('categories_id');
        $data->description = $request->input('des');
        $data->stock = $request->input('stock');
        $data->price = $request->input('price');
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $image->move('uploads/image',$newName);
        $data->image = $newName;
        $data->save();
        return redirect()->route('product.index')->with('alert-success','Data berhasil ditambahkan!');
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
         
        $data = ModelProduct::where('id',$id)->get();
        $categories = ModelCategories::orderBy('categories_name', 'ASC')->get();

         return view('dash/product_edit',compact('data','categories'));
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
        $data = ModelProduct::findOrFail($id);
        $data->product_name = $request->input('name');
        $data->categories_id = $request->input('categories_id');
        $data->description = $request->input('des');
        $data->stock = $request->input('stock');
        $data->price = $request->input('price');
        if (empty($request->file('image'))){
            $data->image = $data->image;
        }
        else{
            unlink('uploads/image/'.$data->image); //menghapus file lama
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $image->move('uploads/image',$newName);
            $data->image = $newName;
        }
        $data->save();
        return redirect()->route('product.index')->with('alert-success','Data berhasil diubah!');
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
       /** $data = ModelProduct::where('id',$id)->first();
        $data->delete();
        return redirect()->route('product.index')->with('alert-success','Data berhasi dihapus!');
        */
    //query select berdasarkan id
    $data = ModelProduct::findOrFail($id);
    //mengecek, jika field photo tidak null / kosong
    if (!empty($data->image)) {
        //file akan dihapus dari folder uploads/produk
        File::delete(public_path('uploads/image/' . $data->image));
    }
    //hapus data dari table
    $data->delete();
    return redirect()->back()->with(['success' => '<strong>' . $data->product_name . '</strong> Telah Dihapus!']);
    }
    
}
