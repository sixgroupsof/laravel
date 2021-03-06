@extends('layouts.app')

@section('link')
    <link href="{{ asset('css/covers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="page-main" class="container">
        <h1 class="page-header"> 修改日记本设置</h1>
        <form action="{{route('update',['id'=>$daybook->id])}}" method="post" accept-charset="utf-8" class="form-small"
              enctype="multipart/form-data">
            @csrf
            <div class="err">
            </div>
            <label> 主题</label><br>
            <input type="text" name="Daybook[thetheme]" value="{{$daybook->thetheme}}">
            <p>
                <label for="description"> 描述：</label><br>
                <textarea id="description" name="Daybook[describe]" cols="20"
                          rows="2">{{$daybook->describe}}</textarea>
            </p>
            <label> 谁可以看到这个日记本？</label><br>
            <select name="Daybook[who]">
                @if($daybook->who==0){
                <option value="0" selected="selected"> 大家</option>
                <option value="1"> 我自己</option>}
                @else{
                <option value="0"> 大家</option>
                <option value="1" selected="selected"> 我自己</option>
                }
                @endif
            </select><p></p>
            <p style="margin-bottom:10px;"><a href="{{route('upload',['id'=>$daybook->id])}}"> 设置封面</a></p>
            <p>
                <input type="submit" value="保存修改">
            </p>
        </form>
    </div>
@endsection

@section('footer')

@endsection