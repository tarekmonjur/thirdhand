<?php

namespace App\Http\Controllers;

use App\Device;
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
        $this->middleware(function (){
           if(Auth::user()->type != 'admin'){
               return back();
           }
        });
    }


    public function showProduct()
    {
        $data['products'] = Device::with('user')->get();
        return view('dashboard.products')->with($data);
    }


    public function addProduct()
    {
        return view('dashboard.add_product');
    }


    public function storeProduct(Request $request)
    {
        $request->validate([
            'device_number' => 'required|max:100|unique:devices,device_no',
            'mobile_no_1' => ['required','min:11','max:13','regex:/^(88)+(017|018|016|015|019)[0-9]+$/'],
            'mobile_no_2' => ['nullable','min:11','max:13','regex:/^(88)+(017|018|016|015|019)[0-9]+$/'],
        ]);

        try{
            $user_id = Auth::user()->id;

            $device = new Device;
            $device->user_id = $user_id;
            $device->device_no = $request->device_number;
            $device->mobile_no_1 = $request->mobile_no_1;
            $device->mobile_no_2 = $request->mobile_no_2;
            $device->created_by = $user_id;
            $device->save();
            $request->session()->flash('success', 'Your device successfully added.');

        }catch(Exception $e){
            $request->session()->flash('error', 'Your device not added.');
        }

        return redirect()->back();
    }


    public function editProduct($id)
    {
        $data['device'] = Device::find($id);
        return view('dashboard.edit_product')->with($data);
    }


    public function updaetProduct(Request $request)
    {
        $request->validate([
            'device_number' => 'required|max:100|unique:devices,device_no,'.$request->id,
            'mobile_no_1' => ['required','min:11','max:13','regex:/^(88)+(017|018|016|015|019)[0-9]+$/'],
            'mobile_no_2' => ['nullable','min:11','max:13','regex:/^(88)+(017|018|016|015|019)[0-9]+$/'],
        ]);

        try{
            $user_id = Auth::user()->id;

            $device = Device::find($request->id);
            $device->user_id = $user_id;
            $device->device_no = $request->device_number;
            $device->mobile_no_1 = $request->mobile_no_1;
            $device->mobile_no_2 = $request->mobile_no_2;
            $device->updated_by = $user_id;
            $device->save();
            $request->session()->flash('success', 'Your device successfully updated.');

        }catch(Exception $e){
            $request->session()->flash('error', 'Your device not updated.');
        }

        return redirect()->back();
    }


    public function deleteProduct(Request $request)
    {
        try{
            Device::find($request->id)->delete();
            $request->session()->flash('success', 'Your device successfully deleted.');
        }catch(Exception $e){
            $request->session()->flash('error', 'Your device not deleted.');
        }
        return redirect()->back();
    }

}
