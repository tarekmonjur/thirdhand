<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
           if(Auth::user()->type != 'admin'){
               return back();
           }
            return $next($request);
        });
    }


    public function showProduct()
    {
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('dashboard.products')->with($data);
    }


    public function addProduct()
    {
        return view('dashboard.add_product');
    }


    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        try{
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_slug = $this->toSlug($request->product_name);
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;
            $product->product_feature = $request->product_feature;
            $product->product_faq = $request->product_faq;
            $product->product_work = $request->product_work;
            if($request->hasFile('product_image')){
                $file_name = $product->product_slug.'_'.time().'.'.$request->product_image->extension();
                $upload_path = 'products/';
                $request->product_image->storeAs($upload_path, $file_name);
                $product->product_image = $file_name;
            }
            $product->save();
            $request->session()->flash('success', 'Your product successfully added.');

        }catch(Exception $e){
            $request->session()->flash('error', 'Your product not added.');
        }

        return redirect()->back();
    }


    public function editProduct($id)
    {
        $data['product'] = Product::find($id);
        return view('dashboard.edit_product')->with($data);
    }


    public function updaetProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        try{
            $product = Product::find($request->id);
            $product->product_name = $request->product_name;
            $product->product_slug = $this->toSlug($request->product_name);
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;
            $product->product_feature = $request->product_feature;
            $product->product_faq = $request->product_faq;
            $product->product_work = $request->product_work;
            if($request->hasFile('product_image')){
                $file_name = $product->product_slug.'_'.time().'.'.$request->product_image->extension();
                $upload_path = 'products/';
                $request->product_image->storeAs($upload_path, $file_name);
                $product->product_image = $file_name;
                if(file_exists(base_path($upload_path.$file_name))){
                    unlink(base_path($upload_path.$file_name));
                }
            }
            $product->save();
            $request->session()->flash('success', 'Your product successfully added.');

        }catch(Exception $e){
            $request->session()->flash('error', 'Your product not added.');
        }

        return redirect()->back();
    }


    public function deleteProduct(Request $request)
    {
        try{
            $product = Product::find($request->id);
            if($product && !empty($product->product_image)){
                if(file_exists(base_path('uploads/products/'.$product->product_image))){
                    unlink(base_path('uploads/products/'.$product->product_image));
                }
            }
            $product->delete();
            $request->session()->flash('success', 'Your product successfully deleted.');
        }catch(Exception $e){
            $request->session()->flash('error', 'Your product not deleted.');
        }
        return redirect()->back();
    }


    private function toSlug($name)
    {
        $name_slug = strtolower(preg_replace('/[\s-_|=+@#$%^&*]/', '-', $name));
        $slug = $name_slug;
        return $slug;
    }

}
