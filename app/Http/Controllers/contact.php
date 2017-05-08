<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// require 'vendor/autoload.php';
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

        //Send via mailgun API
        // $mgClient = new Mailgun(env('MAILGUN_SECRET'));
        // $domain = env('MAILGUN_DOMAIN');

        // $result = $mgClient->sendMessage($domain, array(
        //     'from'    => '121 <mailgun@sandboxa34285454d9a4e2798ca31403c8fda2e.mailgun.org>',
        //     'to'      => 'Alec <alec.bach97@gmail.com>',
        //     'subject' => 'Hello from 121',
        //     'text'    => 'Testing some Mailgun awesomness! Please work'
        // ))
        

        Mail::send('email', ['name' => request('name'), 'email' => request('email'), 'number' => request('number'), 'content' => request('message') ], function ($message)
        {

            $message->from('me@gmail.com', '121');

            $message->to('alec.bach97@gmail.com');

            $message->replyTo(request('email'), $name = request('name'));

            $message->subject('A message from your website.');

        });


        // dd($mgClient);


        return redirect()->to(app('url')->previous(). '#contactSuccess');
    }

}
