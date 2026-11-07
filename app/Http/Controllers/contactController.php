<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $user = $request->user();

        Mail::to('shoyondeb18246@gmail.com')
            ->send(new ContactMessageMail(
                $user,
                $validated['subject'],
                $validated['message']
            ));

        return back()->with('success', 'Your message has been sent successfully.');
    }
}
