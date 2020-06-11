<?php

namespace App\Http\Controllers;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Pamenary\LaravelSms\Sms;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('isAdmin','<>',1)->orderBy('id','desc')->paginate(10);
        return view('admin.users',compact('users'));
    }

    public function userUpdate(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'ncode' => 'required',
            'mobile' => 'required',
            'username' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->ncode = $request->ncode;
        $user->mobile = $request->mobile;
        $user->username = $request->username;
        $user->save();
        $this->alert('success', 'ویرایش اطلاعات با موفقیت انجام شد');
        return back();
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->alert('success','کاربر حذف شد');
        return back();
    }


    public function userChangePass(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|min:8'
        ]);
        $user = User::find($id);
        $user->password = \Hash::make($request->password);
        $user->save();
        $this->alert('success','رمز عبور با موفقیت تغییر کرد');
        return back();
    }

    public function userChangeStatus($id)
    {
        $user = User::find($id);
        if($user->isActive == 1){
            $user->isActive=0;
            $this->alert('success','کاربر با موفقیت غیرفعال شد');
        }else{
            $user->isActive=1;
            $this->alert('success','کاربر با موفقیت فعال شد');
        }
        $user->save();
        return back();
    }




    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);
        if(auth()->check()){
            $user = User::find(auth()->user()->id);
            $user->password = \Hash::make($request->password);
            $user->save();
            $this->alert('success','رمز عبور با موفقیت تغییر کرد');
            return back();
        }else{
            return redirect('login');
        }
    }

    public function newUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'ncode' => 'required|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->ncode = $request->ncode;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = \Hash::make($request->password);
        $user->save();
        auth()->login($user);
        $this->alert('success','ثبت نام شما با موفقیت انجام شد');
        return redirect('profile');
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'mobile' => 'required|max:11|min:11|string'
        ]);
        $user = User::whereMobile($request->mobile)->first();
        if($user!=null)
        {
            $mobile[] = $user->mobile;
            $sms = new Sms();
            $otp = rand(11111,99999);
            \Session::put('otp',$otp);
            \Session::put('mobile',$request->mobile);
            $message = "کد یکبار مصرف جهت بازیابی رمز عبور: ".$otp;
            $sms->sendSMS($mobile,$message);
            return redirect('checkOTP');
        }
        else
        {
            $this->alert('error','کاربری با این شماره همراه یافت نشد');
            return back();
        }

    }

    public function checkOTPForm ()
    {
        return view('auth.passwords.otp');
    }

    public function checkOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|max:6|min:5|string'
        ]);
        if($request->otp == session('otp'))
        {
            \Session::put('checkOTP','200');
            return redirect('userChangePassword');
        }
        else
        {
            $this->alert('error','کد وارد شده صحیح نمی باشد');
            return back();
        }
    }

    public function changePassForm()
    {
        return view('auth.passwords.changepass');
    }

    public function changePassOTP(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        if(session('checkOTP')=='200')
        {
            $user = User::whereMobile(session('mobile'))->first();
            $user->password = \Hash::make($request->password);
            $user->save();
            auth()->login($user);
            $this->alert('success','رمز عبور با موفقیت تغییر کرد');
            return redirect('profile');
        }
        else
        {
            return abort(404);
        }
    }

    public function alert($type,$msg)
    {
        \Session::flash('msg',$msg);
        \Session::flash('type',$type);
    }

}
