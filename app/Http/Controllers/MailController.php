<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendFakeNewsletter;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function newsletter() {
        // TOTEST
        Mail::to('fmontani81@gmail.com')->send(new SendFakeNewsletter());
        return redirect('/posts');
    }
}
