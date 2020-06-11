<?php

namespace App\Http\Controllers;

use App\Message;
use Session;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::where('id','>',0)->paginate(10);
        return view('admin.messages',compact('messages'));
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
        $message = Message::find($id);
        $message->delete();
        $this->alert('success', 'پیام حذف شد');
        return back();
    }

    public function alert($type, $msg)
    {
        Session::flash('msg', $msg);
        Session::flash('type', $type);
    }
}
