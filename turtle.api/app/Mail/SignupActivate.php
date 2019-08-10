<?php

namespace App\Mail;

use App\Model\Token;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;


class SignupActivate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user->id;
        $this->token = $user->activation_token;
        //$this->request = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //TODO
        // $url is NULL - SISTEMARE
        //$url = $this->request->input('url');
        $url = '';
        return $this->from('admin@admin.com')
            ->view('mails.signup-activate')
            ->with('token', $this->token)
            ->with('url', $url)
            ->with('user', $this->user);
    }
}
