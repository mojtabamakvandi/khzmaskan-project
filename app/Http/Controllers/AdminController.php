<?php

namespace App\Http\Controllers;
use App\Setting;
use Pamenary\LaravelSms\Sms;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $sms = new Sms();
        $credit = $sms->getCredit();
        return view('admin.dashboard',compact('credit'));
    }

    public function settings()
    {
        $settings = Setting::first();
        return view('admin.settings',compact('settings'));
    }

    public function uploadLogo(Request $request)
    {
        if($request->hasFile('logo')){
            $settings = Setting::first();
            $photo = $request->logo;
            $name = time().".".$photo->getClientOriginalExtension();
            $directory = public_path()."/"."images" ;
            $photo->move($directory,$name);
            $settings->logoUrl = $name;
            $settings->save();
            $this->alert('success','لوگو با موفقیت آپلود شد');
            return back();
        }else{
            return back();
        }

    }

    public function saveSettings(Request $request)
    {
        $settings = Setting::first();
        $settings->tel = $request->tel;
        $settings->mobile = $request->mobile;
        $settings->email = $request->email;
        $settings->address = $request->address;
        $settings->time = $request->time;
        $settings->welcomeText = $request->welcomeText;
        $settings->headerText = $request->headerText;
        $settings->feature1 = $request->feature1;
        $settings->feature2 = $request->feature2;
        $settings->feature3 = $request->feature3;
        $settings->history = $request->history;
        $settings->historyFeature1 = $request->historyFeature1;
        $settings->historyFeature2 = $request->historyFeature2;
        $settings->mojritd = $request->mojritd;
        $settings->projecttd = $request->projecttd;
        $settings->zarfiat = $request->zarfiat;
        $settings->contactTitle = $request->contactTitle;
        $settings->btnWelcomeText = $request->btnWelcomeText;
        $settings->btnWelcomeLink = $request->btnWelcomeLink;
        $settings->copyRight = $request->copyRight;
        $settings->save();
        $this->alert('success','تنظیمات با موفقیت ذخیره شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }

    public function sendsms()
    {
        $sms = new Sms();
        return $sms->getCredit().' ||| '.$sms->sendSMS(['09363229872'],'').' ||| '.$sms->getCredit();
    }

}
