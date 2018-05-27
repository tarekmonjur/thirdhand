<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('home')->with($data);
    }


    public function product(Request $request)
    {
        $data['product'] = Product::where('product_slug', $request->slug)->first();
        return view('product')->with($data);
    }



}
