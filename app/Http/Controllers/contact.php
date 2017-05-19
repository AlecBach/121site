<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class contact extends Controller
{
       /**
     * The URI to redirect to if validation fails.
     *
     * @var app('url')->previous(). '#contact'
     */

    public function send(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|digits_between:7,12',
            'message' => 'required|min:15|max:1000'
        ]);

        $result = Mail::send('email', ['name' => request('name'), 'email' => request('email'), 'number' => request('number'), 'content' => request('message') ], function ($message)
        {

            $message->from('me@gmail.com', '121');

            $message->to('alec.bach97@gmail.com');

            $message->replyTo(request('email'), $name = request('name'));

            $message->subject('A message from your website.');

        });

        return redirect()->to(app('url')->previous(). '#contactSuccess');
    }

}
