<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Social;
use Captcha;
use Pamenary\LaravelSms\Sms;
use Session;
use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactUs()
    {
        $contact_detail = Setting::first();
        $social_icons = Social::all();
        return view('pages.contact',compact('contact_detail','social_icons'));
    }

    public function contactUsSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:11|max:11',
            'body' => 'required|min:5',
            'captcha' => 'required|captcha',
        ]);

        $message = new Message;
        $message->name = $request->name;

        $message->email = $request->email;
        $message->mobile = $request->mobile;
        $message->body = $request->body;

        if($request->manager_id != null)
            $message->manager_id = $request->manager_id;

        $message->save();
        $this->alert('success','پیام شما با موفقیت ارسال شد.');
        return back();
    }

    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }


    public function answerBySMS(Request $request,$id)
    {
        $message = Message::find($id);
        $sms = new Sms();
        $sms->sendSMS([$message->mobile],$request->answer);
        $message->answered = 1;
        $message->save();
        $this->alert('success','پیامک شما با موفقیت ارسال شد.');
        return back();

    }

    public function answerByEmail($id)
    {

    }
}
