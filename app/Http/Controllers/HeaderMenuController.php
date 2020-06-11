<?php

namespace App\Http\Controllers;

use App\HeaderMenu;
use Session;
use Illuminate\Http\Request;

class HeaderMenuController extends Controller
{
    public function index()
    {
        $headerMenu = HeaderMenu::where('id','>',0)->paginate(10);
        $menu_count = HeaderMenu::count();
        $items = HeaderMenu::all();
        $subMenu = HeaderMenu::where('parent','<>',0)->get();
        return view('admin.headerMenu',compact('headerMenu','menu_count','items','subMenu'));
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
        $headerMenu = new HeaderMenu;
        $headerMenu->title = $request->title;
        $headerMenu->parent = $request->parent;
        $headerMenu->link = $request->link;
        $headerMenu->save();
        $this->alert('success','منو بالا با موفقیت ایجاد شد');
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
        $headerMenu = HeaderMenu::find($id);
        $headerMenu->title = $request->title;
        $headerMenu->parent = $request->parent;
        $headerMenu->link = $request->link;
        $headerMenu->save();
        $this->alert('success','منو بالا با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $headerMenu = HeaderMenu::find($id);
        $headerMenu->delete();
        $this->alert('success','منو بالا حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }

}
