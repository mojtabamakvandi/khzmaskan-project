<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\AnswerMail;
use App\Message;
use Session;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function answerByEmail(Request $request,$id)
    {
        $m = Message::find($id);

        $objDemo = new \stdClass();
        $objDemo->sender = 'انجمن سازندگان مسکن و ساختمان استان خوزستان';
        $objDemo->receiver = $m->name;
        $objDemo->answer = $request->answer;
        $m->answered = 2;
        $m->save();
        Mail::to($m->email)->send(new AnswerMail($objDemo));
        $this->alert('success','پاسخ شما با موفقیت ارسال شد');
        return back();

    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }
}
