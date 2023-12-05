<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailQueueJob;
use App\Mail\SendAdminMail;
use App\Mail\UserMailSend;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function register(Request $request){
        $data = $request->except('_token');
        // dd($data);
        $user = User::create($data);
        $latest_users = User::latest()->take(10)->get();

        dispatch(new SendEmailQueueJob($latest_users, $user, $data));

        return redirect()->back()->with('success', 'User created successfully');
        dd($request->all());
    }
}
