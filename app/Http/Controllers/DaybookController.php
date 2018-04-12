<?php

namespace App\Http\Controllers;

use App\Daybook;
use App\User;
use Illuminate\Http\Request;

class DaybookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
//            $this->daybook = $request->daybook();
            return $next($request);
        });
    }


    public function index()
    {
        $daybooks = $this->daybook;
        // $query =user::where('email','=',$user->email)->firstOrFail();
        return view('user',
            ['daybooks' => $daybooks
            ]);
    }

    public function save(Request $res)
    {
        //报错未定义索引describe，需要添加迁移文件设置长度
        $data = $res->input('Daybook');
        $daybook = new Daybook();
        $id = uniqid();
        $daybook->id = $id;
        $daybook->thetheme = $data['thetheme'];
        $daybook->describe = $data['describe'];
        $daybook->expirationtime = $data['expirationtime'];
        $daybook->who = $data['who'];
        $user = $this->user;
        $daybook->userid=$user->id;
//        dd($daybook);
        if ($daybook->save()) {
            return redirect('user');
        } else {
            return redirect()->back();
        }

    }
}
