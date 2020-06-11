<?php

namespace App\Http\Controllers;
use App\Gallery;
use Session;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('id', '>', 0)->paginate(10);
        return view('admin.projects', compact('projects'));
    }

    public function create()
    {
        return view('admin.newProject');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'boodje' => 'required',
            'body' => 'required',
            'metraj' => 'required',
            'contract' => 'required',
            'tarah' => 'required',
            'nazer' => 'required',
            'location' => 'required',
            'imgSrc' => 'required',
            'person_id' => 'required',
            'malek' => 'required'
        ]);
        $project = new Project;
        $project->title = $request->title;
        $project->user_id = auth()->user()->id;
        $project->boodje = $request->boodje;
        $project->body = $request->body;
        $project->metraj = $request->metraj;
        $project->status = $request->status;
        $project->contract = $request->contract;
        $project->tarah = $request->tarah;
        $project->nazer = $request->nazer;
        $project->location = $request->location;
        $project->person_id = $request->person_id;
        $project->malek = $request->malek;
        $project->save();
        if ($request->hasFile('imgSrc')) {
            $a = Project::find($project->id);
            $photo = $request->imgSrc;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/projects/";
            $photo->move($directory, $name);
            $a->imgSrc = $name;
            $a->save();
        }
        $this->alert('success', 'پروژه با موفقیت ایجاد شد');
        return redirect('cp/projects');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.editProject', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'boodje' => 'required',
            'body' => 'required',
            'metraj' => 'required',
            'contract' => 'required',
            'tarah' => 'required',
            'nazer' => 'required',
            'location' => 'required',
            'person_id' => 'required',
            'malek' => 'required'
        ]);
        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->user_id = auth()->user()->id;
        $project->boodje = $request->boodje;
        $project->body = $request->body;
        $project->metraj = $request->metraj;
        $project->status = $request->status;
        $project->contract = $request->contract;
        $project->tarah = $request->tarah;
        $project->nazer = $request->nazer;
        $project->location = $request->location;
        $project->person_id = $request->person_id;
        $project->malek = $request->malek;
        $project->save();
        if ($request->hasFile('imgSrc')) {
            $a = Project::find($project->id);
            $photo = $request->imgSrc;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/projects/";
            $photo->move($directory, $name);
            $a->imgSrc = $name;
            $a->save();
        }
        $this->alert('success', 'پروژه با موفقیت ویرایش شد');
        return redirect('cp/projects');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        $this->alert('success', 'پروژه حذف شد');
        return back();
    }

    public function showGallery($id)
    {
        $project = Project::findOrFail($id);
        $images = Gallery::where('project_id',$id)->get();
        return view('admin.projectGallery',compact('project','images'));
    }

    public function saveToGallery(Request $request,$id)
    {
        if($request->hasFile('file')) {
            $destinationPath = public_path() . "/" . "images/projects/gallery";
            $extension = $request->file('file')->getClientOriginalExtension();
            $validextensions = array("jpeg", "jpg", "png");
            if (in_array(strtolower($extension), $validextensions)) {
                $fileName = time().rand(11111, 99999) .'.'.$extension;
                $request->file('file')->move($destinationPath, $fileName);
                $gallery = new Gallery;
                $gallery->project_id = $id;
                $gallery->src = $fileName;
                $gallery->user_id = auth()->user()->id;
                $gallery->save();
            }
        }
    }

    public function deleteFromGallery($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        $this->alert('success', 'تصویر حذف شد');
        return back();
    }

    public function alert($type, $msg)
    {
        Session::flash('msg', $msg);
        Session::flash('type', $type);
    }
}
