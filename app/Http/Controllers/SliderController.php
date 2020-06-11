<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('id','>',0)->paginate(10);
        return view('admin.sliders',compact('sliders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'picture' => 'required',
            'btnText' => 'required',
            'btnLink' => 'required'
        ]);
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->src = $request->src;
        $slider->btnText = $request->btnText;
        $slider->btnLink = $request->btnLink;
        if ($request->hasFile('picture')) {
            $photo = $request->picture;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/sliders";
            $photo->move($directory, $name);
            $slider->src = $name;
        }
        $slider->save();
        $this->alert('success','اسلاید با موفقیت ایجاد شد');
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
            'subtitle' => 'required',
            'picture' => 'required',
            'btnText' => 'required',
            'btnLink' => 'required'
        ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->btnText = $request->btnText;
        $slider->btnLink = $request->btnLink;
        if ($request->hasFile('picture')) {
            $photo = $request->picture;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/sliders";
            $photo->move($directory, $name);
            $slider->src = $name;
        }
        $slider->save();
        $this->alert('success','اسلاید با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        $this->alert('success','اسلاید حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
