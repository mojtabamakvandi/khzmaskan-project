<?php

namespace App\Http\Controllers;
use App\FooterMenu;
use Session;
use Illuminate\Http\Request;

class FooterMenuController extends Controller
{
    public function index()
    {
        $footerMenu = FooterMenu::where('id','>',0)->paginate(10);
        return view('admin.footerMenu',compact('footerMenu'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);
        $footerMenu = new FooterMenu;
        $footerMenu->title = $request->title;
        $footerMenu->link = $request->link;
        $footerMenu->save();
        $this->alert('success','منو پایین با موفقیت ایجاد شد');
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
            'title' => 'required',
            'link' => 'required'
        ]);
        $footerMenu = FooterMenu::find($id);
        $footerMenu->title = $request->title;
        $footerMenu->link = $request->link;
        $footerMenu->save();
        $this->alert('success','منو پایین با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $footerMenu = FooterMenu::find($id);
        $footerMenu->delete();
        $this->alert('success','منو پایین حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
