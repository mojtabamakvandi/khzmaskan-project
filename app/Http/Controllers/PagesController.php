<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\Document;
use App\Gallery;
use App\Manager;
use App\Page;
use App\Person;
use App\Project;
use App\Service;
use App\Setting;
use App\Slider;
use App\Social;
use App\Tag;
use App\User;
use phpseclib\Crypt\Hash;
use Session;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function all()
    {
        $pages = Page::orderBy('id','desc')->paginate(10);
        return view('admin.pages',compact('pages'));
    }

    public function pageChangeStatus($id)
    {
        $page = Page::find($id);
        if($page->isActive == 1){
            $page->isActive=0;
            $this->alert('success','صفحه با موفقیت غیرفعال شد');
        }else{
            $page->isActive=1;
            $this->alert('success','صفحه با موفقیت فعال شد');
        }

        $page->save();
        return back();
    }

    public function editPage($id)
    {
        $page = Page::find($id);
        return view('admin.editPage',compact('page'));
    }

    public function showFrmNewPage()
    {
        return view('admin.newPage');
    }

    public function newPage(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subTitle' => 'required',
            'brief' => 'required',
            'picture' => 'required',
            'body' => 'required'
        ]);
        $page = new Page;
        $page->title = $request->title;
        $page->user_id = auth()->user()->id;
        $page->subTitle = $request->subTitle;
        $page->brief = $request->brief;
        $page->isActive = (int)$request->isActive;
        $page->body = $request->body;
        if ($request->hasFile('picture')) {
            $photo = $request->picture;
            $name = time().rand(11111,99999).".".$photo->getClientOriginalExtension();
            $directory = public_path() . "/" . "images/pages/";
            $photo->move($directory, $name);
            $page->picture = $name;
        }
        $page->save();
        $this->alert('success','صفحه با موفقیت ایجاد شد');
        return back();
    }

    public function updatePage(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'subTitle' => 'required',
            'brief' => 'required',
            'body' => 'required'
        ]);
        $page = Page::find($id);
        $page->title = $request->title;
        $page->subTitle = $request->subTitle;
        $page->brief = $request->brief;
        $page->isActive = (int)$request->isActive;
        $page->body = $request->body;
        if ($request->hasFile('picture')) {
            $photo = $request->picture;
            $name = time().rand(11111,99999).".".$photo->getClientOriginalExtension();
            $directory = public_path() . "/" . "images/pages/";
            $photo->move($directory, $name);
            $page->picture = $name;
        }
        $page->save();
        $this->alert('success','صفحه با موفقیت ویرایش شد');
        return back();
    }

    public function deletePage ($id)
    {
        $page = Page::find($id);
        $page->delete();
        $this->alert('success','صفحه با موفقیت حذف شد');
        return back();
    }



    public function homepage()
    {
        $slider = Slider::all();
        $data = Setting::first();
        $services = Service::all();
        $projects = Project::all();
        $articles_count = Article::where('status','on')->count();
        $articles = Article::where('status','on')->get();
        $managers_count = Manager::where('id','>',0)->count();
        $managers = Manager::all();
        return view('pages.homepage',compact('slider','data','services','projects','articles_count','articles','managers_count','managers'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $results = Article::where('title','like','%'.$search.'%')->orWhere('body','like','%'.$search.'%')->get();
        $count = Article::where('title','like','%'.$search.'%')->orWhere('body','like','%'.$search.'%')->count();
        return view('pages.searchResult',compact('results','count'));
    }

    public function showManager($id)
    {
        $manager = Manager::findOrFail($id);
        return view('pages.manager',compact('manager'));
    }

    public function showService(Request $request,$id)
    {
        $service = Service::findOrFail($id);
        return view('pages.service',compact('service'));
    }

    public function showArticle(Request $request,$id)
    {
        $article = Article::find($id);
        $comment_count = Comment::where('article_id',$id)->where('accept',1)->count();
        $comments = Comment::where('article_id',$id)->where('accept',1)->get();
        return view('pages.article',compact('article','comment_count','comments'));
    }

    public function sendComment(Request $request,$id)
    {
        $this->validate($request, [
            'body' => 'required|min:5',
            'captcha' => 'required|captcha'
        ]);
        $comment = new Comment;
        $comment->commenter_id = auth()->user()->id;
        $comment->user_id = auth()->user()->id;
        $comment->body = $request->body;
        $comment->article_id = $id;
        $comment->save();
        $this->alert('success', 'دیدگاه شما با موفقیت ثبت شد');
        return back();
    }

    public function showProject($id)
    {
        $project = Project::find($id);
        $images = Gallery::where('project_id',$id)->get();
        return view('pages.project',compact('project','images'));
    }

    public function mojriShowForm()
    {
        return view('pages.mojriRegister');
    }

    public function mojriStore(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'ncode' => 'required|unique:users',
            'ozviat' => 'required',
            'parvaneh' => 'required',
            'mobile' => 'required|unique:users',
            'tel' => 'required',
            'address' => 'required',
            'numFish' => 'required',
            'dtFish' => 'required',
            'frontParvaneh' => 'required',
            'backParvaneh' => 'required',
            'captcha' => 'required|captcha',
            'fishBanki' => 'required'
        ]);



        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->ncode = $request->ncode;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->username = $request->ncode;
        $user->save();
        $mojri = new Person;
        $mojri->user_id = $user->id;
        $mojri->parvaneh = $request->parvaneh;
        $mojri->ozviat = $request->ozviat;
        $mojri->type = $request->type;
        $mojri->type = $request->type;
        $mojri->save();
        if ($request->hasFile('frontParvaneh')) {
            $doc1 = new Document;
            $doc1->person_id = $mojri->id;
            $doc1->title = 'frontParvaneh';
            $photo1 = $request->frontParvaneh;
            $name1 = time().rand(11111, 99999). "." . $photo1->getClientOriginalExtension();
            $doc1->type = $photo1->getClientOriginalExtension();
            $directory1 = public_path() . "/" . "images/documents/";
            $photo1->move($directory1, $name1);
            $doc1->url = $name1;
            $doc1->type = $photo1->getClientOriginalExtension();
            $doc1->save();
        }
        if ($request->hasFile('backParvaneh')) {
            $doc2 = new Document;
            $doc2->person_id = $mojri->id;
            $doc2->title = 'backParvaneh';
            $photo2 = $request->backParvaneh;
            $name2 = time().rand(11111, 99999) . "." . $photo2->getClientOriginalExtension();
            $doc2->type = $photo2->getClientOriginalExtension();
            $directory2 = public_path() . "/" . "images/documents/";
            $photo2->move($directory2, $name2);
            $doc2->url = $name2;
            $doc2->type = $photo2->getClientOriginalExtension();
            $doc2->save();
        }
        if ($request->hasFile('fishBanki')) {
            $doc3 = new Document;
            $doc3->person_id = $mojri->id;
            $doc3->title = 'fishBanki';
            $photo3 = $request->fishBanki;
            $name3 = time().rand(11111, 99999).".". $photo3->getClientOriginalExtension();
            $doc3->type = $photo3->getClientOriginalExtension();
            $directory3 = public_path() . "/" . "images/documents/";
            $photo3->move($directory3, $name3);
            $doc3->url = $name3;
            $doc3->type = $photo3->getClientOriginalExtension();
            $doc3->save();
        }
        $this->alert('success', 'ثبت نام شما با موفقیت انجام شد');
        return back();

    }

    public function showProfleUser()
    {
        $user = auth()->user();
        return view('pages.profileUser',compact('user'));
    }

    public function profleUserUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'ncode' => 'required',
            'mobile' => 'required',
            'username' => 'required',
            'captcha' => 'required|captcha'
        ]);
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->ncode = $request->ncode;
        $user->mobile = $request->mobile;
        $user->username = $request->username;
        if ($request->hasFile('avatar')) {
            $photo = $request->avatar;
            $name = time().rand(11111,99999).".".$photo->getClientOriginalExtension();
            $directory = public_path() . "/" . "images/avatars/";
            $photo->move($directory, $name);
            $user->avatar = $name;
        }
        $user->save();
        $this->alert('success', 'ویرایش اطلاعات با موفقیت انجام شد');
        return back();
    }

    public function showProfleProjects()
    {
        $mojri = Person::where('user_id',auth()->user()->id)->first();
        if($mojri!=null)
        {
            $projects = Project::where('person_id',$mojri->id)->get();
            return view('pages.profileProjects',compact('projects'));
        }
        else return abort(404);
    }

    public function showProjectsGallery($id)
    {
        $project = Project::findOrFail($id);
        $images = Gallery::where('project_id',$id)->get();
        return view('pages.projectGallery',compact('project','images'));
    }

    public function addProject(Request $request)
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
            'malek' => 'required'
        ]);
        $project = new Project;
        $project->title = $request->title;
        $project->user_id = auth()->user()->id;
        $project->boodje = $request->boodje;
        $project->body = $request->body;
        $project->metraj = $request->metraj;
        $project->contract = $request->contract;
        $project->tarah = $request->tarah;
        $project->nazer = $request->nazer;
        $project->location = $request->location;
        $project->person_id = auth()->user()->id;
        $project->malek = $request->malek;
        $project->save();
        if ($request->hasFile('imgSrc')) {
            $a = Project::find($project->id);
            $photo = $request->imgSrc;
            $name = time().rand(11111,99999).".".$photo->getClientOriginalExtension();
            $directory = $directory = public_path()."/"."images/projects/";
            $photo->move($directory, $name);
            $a->imgSrc = $name;
            $a->save();
        }
        $this->alert('success', 'پروژه با موفقیت ایجاد شد');
        return back();
    }

    public function editProject($id)
    {
        $project = Project::find($id);
        return view('pages.editProfileProjects',compact('project'));

    }

    public function updateProject(Request $request,$id)
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
            'malek' => 'required'
        ]);
        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->user_id = auth()->user()->id;
        $project->boodje = $request->boodje;
        $project->body = $request->body;
        $project->metraj = $request->metraj;
        $project->contract = $request->contract;
        $project->tarah = $request->tarah;
        $project->nazer = $request->nazer;
        $project->location = $request->location;
        $project->person_id = auth()->user()->id;
        $project->malek = $request->malek;
        $project->save();
        if ($request->hasFile('imgSrc')) {
            $a = Project::find($project->id);
            $photo = $request->imgSrc;
            $name = time() .rand(11111, 99999) . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/projects/";
            $photo->move($directory, $name);
            $a->imgSrc = $name;
            $a->save();
        }
        $this->alert('success', 'پروژه با موفقیت ویرایش شد');
        return redirect('profile/projects');

    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        $this->alert('success', 'پروژه حذف شد');
        return back();
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

















    public function showProfleDocuments()
    {
        $mojri = Person::where('user_id',auth()->user()->id)->first();
        if($mojri!=null)
        {
            $docs = Document::where('person_id',$mojri->id)->get();
            return view('pages.profileDocs',compact('docs'));
        }
        else return abort(404);
    }

    public function profleDocumentsUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'doc' => 'required',
            'captcha' => 'required|captcha',
        ]);

        $document = new Document;
        $mojri = Person::where('user_id',auth()->user()->id)->first();
        $document->person_id = $mojri->id;
        $document->title = $request->title;
        if ($request->hasFile('doc')) {
            $photo = $request->doc;
            $name = time().rand(11111,99999).".".$photo->getClientOriginalExtension();
            $directory = public_path() . "/" . "images/documents/";
            $photo->move($directory, $name);
            $document->url = $name;
        }
        $document->save();
        $this->alert('success', ' بارگزاری با موفقیت انجام شد');
        return redirect('profile/documents');
    }

    public function profleDocumentsDelete(Request $request,$id)
    {
        $mojri = Person::where('user_id',auth()->user()->id)->first();
        $doc = Document::find($id);
        if($doc->person_id == $mojri->id)
        {
            $doc->delete();
            $this->alert('success', 'فایل مورد نظر حذف شد');
            return back();
        }else{
            $this->alert('error', 'شما به فایل مورد نظر دسترسی ندارید');
            return back();
        }

    }




    public function showProfleMojri()
    {
        $mojri = Person::where('user_id',auth()->user()->id)->first();
        if($mojri!=null)
        return view('pages.profileMojri',compact('mojri'));
        else return abort(404);
    }

    public function profleMojriUpdate(Request $request)
    {
        $request->validate([
            'parvaneh' => 'required',
            'ozviat' => 'required',
            'pejra' => 'required',
            'type' => 'required',
            'dtactive' => 'required',
            'dtsodoor' => 'required',
            'etebar' => 'required',
            'zarfiatTD' => 'required',
            'zarfiatMetraj' => 'required',
            'captcha' => 'required|captcha',
        ]);

        $mojri = Person::where('user_id',auth()->user()->id)->first();
        $mojri->parvaneh = $request->parvaneh;
        $mojri->ozviat = $request->ozviat;
        $mojri->pejra = $request->pejra;
        $mojri->type = $request->type;
        $mojri->dtactive = $request->dtactive;
        $mojri->dtsodoor = $request->dtsodoor;
        $mojri->etebar = $request->etebar;
        $mojri->zarfiatTD = $request->zarfiatTD;
        $mojri->zarfiatMetraj = $request->zarfiatMetraj;
        $mojri->save();
        $this->alert('success', 'ویرایش اطلاعات با موفقیت انجام شد');
        return back();

    }


    public function showArticles()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $articles = Article::where('id','>',0)->orderBy('id','desc')->paginate(10);
        $links = $articles->links();
        //$links = str_replace("<a", "<a class='ajax' ", $links);
        $comments = Comment::orderBy('id','desc')->take(5)->get();
        $soci = Social::all();
        return view('pages.articles',compact('categories','tags','articles','comments','soci','links'));
    }




    public function changeUserPassword()
    {
        return view('pages.changePass');
    }

    public function doChangeUserPassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $this->validate($request, [
            'oldpass' => 'required',
            'password' => 'confirmed|min:8|different:oldpass',
            'captcha' => 'required|captcha'
        ]);
        if (\Hash::check($request->oldpass, $user->password)) {
            $user->fill([
                'password' => \Hash::make($request->password)
            ])->save();
            $this->alert('success', 'رمز عبور شما با موفقیت تغییر کرد');
            return back();
        } else {
            $this->alert('error', 'رمز عبور فعلی شما اشتباه است');
            return back();
        }
    }

    public function searchCategory($id)
    {
        $results = Article::where('category_id',$id)->get();
        $count = Article::where('category_id',$id)->count();
        return view('pages.searchResult',compact('results','count'));
    }

    public function searchTag($id)
    {
        $tags = Tag::where('id',$id)->get();

        $results = $tags->map(function($v) {
            return $v->articles;
        })
            ->flatten()
            ->all();

        $count = $tags->map(function($v) {
            return $v->articles;
        })
            ->flatten()
            ->count();
        return view('pages.searchResult',compact('results','count'));
    }

    public function searchAuthor($id)
    {
        $results = Article::where('user_id',$id)->get();
        $count = Article::where('user_id',$id)->count();
        return view('pages.searchResult',compact('results','count'));
    }

    public function searchCommenter($id)
    {
        abort(404);
    }

    public function showPage($id)
    {
        $page = Page::where('id',$id)->where('isActive',true)->first();
        if($page==null)
        {
            abort(404);
        }
        return view('pages.page',compact('page'));
    }





    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
