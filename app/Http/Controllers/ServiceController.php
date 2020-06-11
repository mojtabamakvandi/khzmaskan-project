<?php

namespace App\Http\Controllers;

use App\Service;
use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('id','>',0)->paginate(10);
        return view('admin.services',compact('services'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subTitle' => 'required',
            'icon' => 'required',
            'picture' => 'required',
            'body' => 'required',
            'headerBanner' => 'required'
        ]);
        $service = new Service();
        $service->title = $request->title;
        $service->subTitle = $request->subTitle;
        $service->icon = $request->icon;
        $service->body = $request->body;
        if ($request->hasFile('headerBanner')) {
            $photo = $request->headerBanner;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/services";
            $photo->move($directory, $name);
            $service->headerBanner = $name;
        }
        if ($request->hasFile('picture')) {
            $photo = $request->picture;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/services";
            $photo->move($directory, $name);
            $service->picture = $name;
        }
        $service->user_id = auth()->user()->id;
        $service->save();
        $this->alert('success','سرویس با موفقیت ایجاد شد');
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
            'subTitle' => 'required',
            'icon' => 'required',
            'picture' => 'required',
            'body' => 'required',
            'headerBanner' => 'required'
        ]);
        $service = Service::find($id);
        $service->title = $request->title;
        $service->subTitle = $request->subTitle;
        $service->icon = $request->icon;
        $service->body = $request->body;
        if ($request->hasFile('headerBanner')) {
            $photo = $request->headerBanner;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/services";
            $photo->move($directory, $name);
            $service->headerBanner = $name;
        }
        if ($request->hasFile('picture')) {
            $photo = $request->picture;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/services";
            $photo->move($directory, $name);
            $service->picture = $name;
        }
        $service->user_id = auth()->user()->id;
        $service->save();
        $this->alert('success','سرویس با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        $this->alert('success','سرویس حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
