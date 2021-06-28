<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendFakeNewsletter;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function newsletter(Request $request) {
        // TOTEST
        $form_data = $request->all();
        Mail::to($form_data['user-email'])->send(new SendFakeNewsletter());
        return redirect('/posts');
    }
}
