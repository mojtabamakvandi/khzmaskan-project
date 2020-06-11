<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Session;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('id', '>', 0)->paginate(10);
        $categories = Category::all();
        return view('admin.articles', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.newArticle', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subTitle' => 'required',
            'body' => 'required',
            'brief' => 'required',
            'picture' => 'required',
            'category_id' => 'required'
        ]);
        $article = new Article;
        $article->title = $request->title;
        $article->user_id = auth()->user()->id;
        $article->subTitle = $request->subTitle;
        $article->body = $request->body;
        $article->brief = $request->brief;
        $article->status = $request->status;
        $article->category_id = $request->category_id;
        $article->save();
        if ($request->tags != null) {
            $article->tags()->sync($request->tags);
        }
        if ($request->hasFile('picture')) {
            $a = Article::find($article->id);
            $photo = $request->picture;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/articles/";
            $photo->move($directory, $name);
            $a->picture = $name;
            $a->save();
        }
        $this->alert('success', 'مطلب با موفقیت ایجاد شد');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $article = Article::find($id);
        return view('admin.editArticle', compact('categories', 'tags', 'article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subTitle' => 'required',
            'body' => 'required',
            'brief' => 'required',
            'category_id' => 'required'
        ]);
        $article = Article::find($id);
        $article->title = $request->title;
        $article->user_id = auth()->user()->id;
        $article->subTitle = $request->subTitle;
        $article->body = $request->body;
        $article->brief = $request->brief;
        $article->status = $request->status;
        $article->category_id = $request->category_id;
        $article->save();
        if ($request->tags != null) {
            $article->tags()->sync($request->tags);
        }
        if ($request->hasFile('picture')) {
            $a = Article::find($article->id);
            $photo = $request->picture;
            $name = time() . "." . $photo->getClientOriginalExtension();
            $directory = $directory = public_path() . "/" . "images/articles/";
            $photo->move($directory, $name);
            $a->picture = $name;
            $a->save();
        }
        $this->alert('success', 'مطلب با موفقیت ویرایش شد');
        return back();
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->delete();
        $this->alert('success', 'مطلب حذف شد');
        return back();
    }

    public function alert($type, $msg)
    {
        Session::flash('msg', $msg);
        Session::flash('type', $type);
    }
}
