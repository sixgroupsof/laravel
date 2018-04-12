<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use Illuminate\Http\UploadedFile;
use Storage;

class PerfectInformationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = $this->user;
        $query = user::where('email', '=', $user->email)->firstOrFail();

        if ($request->isMethod('POST')) {

            $file = $request->file('imgUrl');
            if ($file->isValid())// 文件是否上传成功
            {
                // $oldFileName->getClientOriginalName();// 原文件名??5.6失效

                $ext = $file->getClientOriginalExtension();// 扩展名

                // $file->getClientMimeType();// MimeType

                $realPath = $file->getRealPath();// 临时绝对路径

                $newFileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

                Storage::disk('uploads')->put($newFileName, file_get_contents($realPath));

                $query->imgUrl = 'storage/app/uploads/' . $newFileName;

            }

            if ($query != null) {
                $data = $request->input('user');

                $query->description = $data['description'];
                $query->save();
                return view('user', [
                    'user' => $query
                ]);
            }
        }

        return view('perfectInformation', [
            'user' => $query
        ]);


    }
}
