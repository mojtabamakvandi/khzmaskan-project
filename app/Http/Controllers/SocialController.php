<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
use Session;
use Shetabit\Payment\PaymentManager;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::where('id','>',0)->paginate(10);
        return view('admin.socials',compact('socials'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required'
        ]);
        $social = new Social();
        $social->name = $request->name;
        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->save();
        $this->alert('success','شبکه اجتماعی با موفقیت ایجاد شد');
        return back();

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required'
        ]);
        $social = Social::find($id);
        $social->name = $request->name;
        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->save();
        $this->alert('success','شبکه اجتماعی با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $social = Social::find($id);
        $social->delete();
        $this->alert('success','شبکه اجتماعی حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
