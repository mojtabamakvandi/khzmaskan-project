<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $answer;

    public function __construct($answer)
    {
        $this->answer = $answer;
    }


    public function build()
    {
        return $this->from('info@khzmaskan.ir')
                    ->view('mails.answer')
                    ->subject('پاسخ پیام ارسالی شما به انجمن سازندگان مسکن و ساختمان استان خوزستان')
                    ->with([
                    'sender' => $this->answer->sender,
                    'receiver' => $this->answer->receiver,
                    'answer' => $this->answer->answer,
                ]);
    }
}
