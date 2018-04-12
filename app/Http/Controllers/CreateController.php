<?php
namespace App\Http\Controllers;
use App\Diary;
use Illuminate\Http\Request;
class CreateController extends Controller
{
    public function index(){
        return view('create');
    }

    public function save(Request $res){
        //报错未定义索引describe，需要添加迁移文件设置长度
        $data=$res->input('Diary');
        $diary=new Diary();
        $id=uniqid();
        $diary->id=$id;
        $diary->thetheme=$data['thetheme'];
        $diary->describe=$data['describe'];
        $diary->expirationtime=$data['expirationtime'];
//        dd($diary);
        if($diary->save()){
            return redirect('create1');
        }else{
            return redirect()->back();
        }

    }


    public function show(){

    }

}