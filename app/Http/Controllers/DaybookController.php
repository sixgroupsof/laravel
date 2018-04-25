<?php

namespace App\Http\Controllers;

use App\Daybook;
use Illuminate\Http\Request;

class DaybookController extends Controller
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
        return view('daybook');
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
//        $daybook->who =intval($data['who']);
        $daybook->who = (int)$data['who'];
//        var_dump($daybook->who);
//        exit;
        $user = $this->user;
        $daybook->userid = $user->id;
        $path = $res->file('daybookimgUrl')->store('public');
        $daybook->imgUrl = asset('storage/app/public');
        $replaced = str_replace_first('public//', '/', $path);
        $adjusted = str_start($replaced, 'storage/app/');
        $daybook->imgUrl = $adjusted;
//        dd($path,$daybook->imgUrl,$replaced,$adjusted);
        if ($daybook->save()) {
            return redirect('user');
        } else {
            return redirect()->back();
        }
    }


    public function upload(Request $res,$id)
    {
        $daybook = Daybook::find($id);
        if ($res->isMethod('post')) {
            $path = $res->file('cover')->store('public');
            $daybook->imgUrl = asset('storage/app/public');
            $replaced = str_replace_first('public//', '/', $path);
            $adjusted = str_start($replaced, 'storage/app/');
            $daybook->imgUrl = $adjusted;
            dd($daybook->imgUrl);
            $daybook->save();
        }
        return view('cover', ['daybook' => $daybook]);
    }

    public function details($id)
    {
        $user = $this->user;
        $daybook = Daybook::find($id);
        return view('notebook', [
                'user' => $user,
                'daybook' => $daybook]
        );
    }


    public function update(Request $res, $id)
    {
        $user = $this->user;
        $daybook = Daybook::find($id);
        if ($res->isMethod('post')) {
            $res_daybook = $res->input('Daybook');
            $daybook->thetheme = $res_daybook['thetheme'];
            $daybook->describe = $res_daybook['describe'];
            $daybook->who = (int)$res_daybook['who'];
//            dd($daybook);
            if ($daybook->save()) {
                return view('notebook', [
                    'user' => $user,
                    'daybook' => $daybook]);
            }
        }
//        dd($daybook);
        return view('settings', ['daybook' => $daybook]);
    }
}
