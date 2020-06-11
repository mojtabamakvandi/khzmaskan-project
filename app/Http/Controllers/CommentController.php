<?php

namespace App\Http\Controllers;

use App\Comment;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::where('id','>',0)->paginate(10);
        return view('admin.comments',compact('comments'));
    }

    public function accept($id)
    {
        $comment = Comment::find($id);
        if($comment->accept == 1){
            $comment->accept=0;
            $this->alert('error','نظر با موفقیت رد شد');
        }else{
            $comment->accept=1;
            $this->alert('success','نظر با موفقیت پذیرفته شد');
        }
        $comment->save();
        return back();
    }

    public function answer(Request $request,$id)
    {
        $comment = Comment::find($id);
        $comment->accept = 1;
        $answer = new Comment;
        $answer->commenter_id = auth()->user()->id;
        $answer->user_id = auth()->user()->id;
        $answer->comment_id = $id;
        $answer->accept = 1;
        $answer->answer = 1;
        $answer->body = $request->answer;
        $answer->article_id = $comment->article_id;
        $answer->save();
        $comment->save();
        $this->alert('success','نظر با موفقیت پاسخ داده شد');
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
        $comment = Comment::find($id);
        $comment->delete();
        $this->alert('success', 'نظر حذف شد');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
