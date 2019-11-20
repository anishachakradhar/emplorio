<?php

namespace App\Http\Controllers;
use App\Mail\ApplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        Mail::to('deepikashrestha82@gmail.com')->send(new ApplyMail());
    }
}
