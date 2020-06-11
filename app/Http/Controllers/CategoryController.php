<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('id','>',0)->paginate(10);
        return view('admin.categories',compact('categories'));
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
        $category = new Category;
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
        $this->alert('success','دسته بندی با موفقیت ایجاد شد');
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
            'category_id' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
        $this->alert('success','با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $this->alert('success','دسته بندی حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
