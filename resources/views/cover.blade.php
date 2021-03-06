@extends('layouts.app')

@section('link')
    {{--<link href="{{ asset('css/cover.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/covers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="page-main" class="container">
        <h1 class="page-header">设置《{{$daybook->thetheme}}》的封面</h1>
        <form action="{{route('upload',['id'=>$daybook->id])}}" method="post" class="form-small"
              enctype="multipart/form-data">
            @csrf
            <div class="err">
            </div>
            <label>当前封面</label>
            <p style="margin-bottom:10px;">
                <img src="../../../{{ $daybook->imgUrl }}" alt="{{$daybook->thetheme}}" style="width: 160px;height: 120px;margin-bottom: 10px">
            </p>
            <label>新封面图片</label>
            <p></p>
            <input type="file" name="cover">
            <p></p>
            <p><input class="btn-submit" type="submit" value="设置封面">&nbsp&nbsp&nbsp
                <input class="btn-cancel" type="button" value="取消" onclick="javascript:history.back(-1);"></p>
        </form>
    </div>
@endsection

@section('footer')

@endsection