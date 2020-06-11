<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use Session;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $mojriha = Person::orderBy('id','desc')->paginate(10);
        return view('admin.mojriha',compact('mojriha'));
    }

    public function mojriChangeStatus($id)
    {
        $mojri = Person::find($id);
        if($mojri->isActive == 1){
            $mojri->isActive=0;
            $this->alert('success','مجری با موفقیت غیرفعال شد');
        }else{
            $mojri->isActive=1;
            $this->alert('success','مجری با موفقیت فعال شد');
        }
        $mojri->save();
        return back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function destroy($id)
    {
        $mojri = Person::find($id);
        $user = User::where('id',$mojri->user_id)->first();
        $user->delete();
        $mojri->delete();
        $this->alert('success','مجری و کاربری آن حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        \Session::flash('msg',$msg);
        \Session::flash('type',$type);
    }
}
