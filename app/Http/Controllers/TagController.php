<?php

namespace App\Http\Controllers;
use Session;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::where('id','>',0)->paginate(10);
        return view('admin.tags',compact('tags'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->user_id = auth()->user()->id;
        $tag->save();
        $this->alert('success','برچسب با موفقیت ایجاد شد');
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
            'name' => 'required'
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        $this->alert('success','برچسب با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $this->alert('success','برچسب حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
