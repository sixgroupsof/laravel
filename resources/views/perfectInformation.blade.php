@extends('layouts.app')

@section('link')
    <!-- <link href="{{ asset('css/perfectInformation.css') }}" rel="stylesheet"> -->
@endsection

@section('content')
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}">  -->
    <div class="container">
        <div class="row">
            <h2 style="color: #555;" class="col-md-12">个人信息</h2>
            <div class="row col-md-12">
                <div style="background-color: #39E;width: 350px;height:3px;margin-left:16px;"></div>
            </div>

            <form name="PerfectInformation" method="POST" action="{{ route('perfectInformation') }}"
                  enctype="multipart/form-data" class="col-md-4" style="margin-top:10px;">
                <!-- 419错误 -->
                @csrf

                <div class="form-group">
                    <label>个人描述：</label>
                    <textarea name="user[description]" class="form-control"
                              value="{{ old('description')?old('description'):$user->description }} "
                              rows="10">{{ $user->description }}</textarea>
                </div>
                <div class="form-group">
                    <img style="width:80px;height:80px;" src="~../../../{{ $user->imgUrl }}" alt="">
                    <button style="margin-top:12%;" type="button" class="btn btn-primary btn-sm">预览</button>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">图片上传：</label>
                    <input name="imgUrl" type="file" id="exampleInputFile">
                </div>

                <div class="divcenter">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>


    </div>

@endsection