<?php

namespace App\Http\Controllers;

use App\Mail\Approval;
use App\Mail\Contact;
use App\Mail\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contact (Request $request) {
        Mail::to('info@mseg.jp')->send(new Contact($request));
        return view('pages.contact', ['sended' => true]);
    }

    public function approval (Request $request) {
        Mail::to('info@mseg.jp')->send(new Approval($request));
        return view('pages.approval', ['sended' => true]);
    }

    public function survey (Request $request) {
        Mail::to('info@mseg.jp')->send(new Survey($request));
        return view('pages.survey', ['sended' => true]);
    }
}
