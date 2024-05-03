<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Rules\ReCaptchaV3;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Shows the contact page with the contact form
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Processes the contact form post
     */
    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
            'email' => ['required', 'email:rfc'],
            // 'g-recaptcha-response' => ['required', new ReCaptchaV3('submitContact')]
        ]);

        // RecaptCha V3 and other rules have passed, safe to continue

        // Here you can add code to actually send the email message
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('message', 'Terimakasih telah menghubugi kami. Pesanmu telah dikirim. ');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('pesan.view')->with('message', 'Pesan telah dihapus');
    }
}