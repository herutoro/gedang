<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelProduct;
use App\ModelCategories;

class FrontPages extends Controller
{
    //

   public function index()
    {
    	
        $produk = ModelProduct::all();
        $produk = ModelProduct::with('categories')->orderBy('created_at', 'DESC')->paginate(9);
        return view('front/shop',compact('produk'));
    }
}