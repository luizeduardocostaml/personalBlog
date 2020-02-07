<?php

namespace App\Mail;

use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $question;
    public $answer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message, $answer)
    {
        $this->question = $message;
        $this->answer = $answer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('blog@blog.com.br')->subject('Sua resposta!')->view('mail.answerMessage');
    }
}
