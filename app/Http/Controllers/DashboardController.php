<?php

namespace App\Http\Controllers;

use App\User;
use App\Device;
use App\SmsLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('sendSMS');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.home');
    }


    public function showDevices()
    {
        if(Auth::user()->type == 'admin'){
            $data['devices'] = Device::with('user')->get();
        }else{
            $data['devices'] = Device::with('user')->where('user_id', Auth::user()->id)->get();
        }
        return view('dashboard.devices')->with($data);
    }


    public function addDevice()
    {
        return view('dashboard.add_device');
    }


    public function storeDevice(Request $request)
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


    public function editDevice($id)
    {
        $data['device'] = Device::find($id);
        return view('dashboard.edit_device')->with($data);
    }


    public function updaetDevice(Request $request)
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


    public function deleteDevice(Request $request)
    {
        try{
            Device::find($request->id)->delete();
            $request->session()->flash('success', 'Your device successfully deleted.');
        }catch(Exception $e){
            $request->session()->flash('error', 'Your device not deleted.');
        }
        return redirect()->back();
    }


    public function smsLogs()
    {
        if(Auth::user()->type == 'admin'){
            $data['sms_logs'] = SmsLog::get();
        }else{
            $data['sms_logs'] = SmsLog::where('user_id', Auth::user()->id)->get();
        }
        return view('dashboard.sms_logs')->with($data);
    }


    public function showCustomers()
    {
        if(Auth::user()->type != 'admin'){
            return redirect()->back();
        }
        $data['users'] = User::get();
        return view('dashboard.customer')->with($data);
    }


    public function sendSMS(Request $request)
    {
        $device_no = $request->device_no;
        $device = Device::with('user')->where('device_no', $device_no)->first();
        // dd($device);
        if($device){
            $msg = 'Hi '.ucfirst($device->user->name).', Gas Leakage detected !!! Please check device '.$device->device_no.' !!!';
            $response1 = $this->curl_sms_send($device->mobile_no_1, $msg);

            if(stristr($response1, 'SMS SUBMITTED')){
                $smsLog = new SmsLog;
                $smsLog->user_id = $device->user_id;
                $smsLog->device_no = $device->device_no;
                $smsLog->mobile_number = $device->mobile_no_1;
                $smsLog->body = $msg;
                $smsLog->response = $response1;
                $smsLog->status = 'success';
                $smsLog->save();
            }else{
                $smsLog = new SmsLog;
                $smsLog->user_id = $device->user_id;
                $smsLog->device_no = $device->device_no;
                $smsLog->mobile_number = $device->mobile_no_1;
                $smsLog->body = $msg;
                $smsLog->response = $response1;
                $smsLog->status = 'not success';
                $smsLog->save();
            }

            // print_r($response1); exit;
            if(!empty($device->mobile_no_2)){
                $response2 = $this->curl_sms_send($device->mobile_no_2, $msg);

                if(stristr($response1, 'SMS SUBMITTED')){
                    $smsLog = new SmsLog;
                    $smsLog->user_id = $device->user_id;
                    $smsLog->device_no = $device->device_no;
                    $smsLog->mobile_number = $device->mobile_no_2;
                    $smsLog->body = $msg;
                    $smsLog->response = $response2;
                    $smsLog->status = 'success';
                    $smsLog->save();
                }else{
                    $smsLog = new SmsLog;
                    $smsLog->user_id = $device->user_id;
                    $smsLog->device_no = $device->device_no;
                    $smsLog->mobile_number = $device->mobile_no_2;
                    $smsLog->body = $msg;
                    $smsLog->response = $response2;
                    $smsLog->status = 'not success';
                    $smsLog->save();
                }
                // print_r($response2); exit;
            }
        }



    }


    private function curl_sms_send($mobile_no, $message)
    {
        $api_key = 'C20011345a8d79457290c3.72336453';
        $contacts = $mobile_no; //sender number 88017xxxxx
        $senderId = '8804445629106';
        $msg = urlencode($message);
        $url = 'http://esms.dianahost.com/smsapi?api_key='.$api_key.'&type=text&contacts='.$contacts.'&senderid='.$senderId.'&msg='.$msg;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Sample cURL Request');
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


}
