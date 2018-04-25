<?php

namespace App\Http\Controllers;
use App\Daybook;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            return $next($request);
        });
    }


    public function index()
    {
        $user = $this->user;
        $daybook =Daybook::where('userid','=',$user->id)->get();
//        $replaced = str_replace_first('the', 'a', 'the quick brown fox jumps over the lazy dog');
//        $slug = str_slug('Laravel 5 Framework', '-');
//        $adjusted = str_start('this/string', '/');
//        $slice = str_after('This is my name', 'i');
//        $a=$user->imgUrl;
//        $url = route('details',['userid'=>1]);
//        dd($url);
//        dd($daybook->id);
        return view('user', [
            'user' => $user,
            'daybook' => $daybook
        ]);
    }
}
