@extends('layouts.app')

@section('link')
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- 左边内容区域 -->
            <div class="col-md-8">
                <h1>《{{$daybook->thetheme}}》</h1>
                <a class="btn action" href="{{route('update',['id'=>$daybook->id])}}">设置</a>
                <div class="diarys">
                    <div class="diary">
                        <div class="body">
                            <div class="title">
                                <p class="releasetime">10:40</p>
                            </div>
                            <img src="{{ asset('img/voqgt8t3.jpg') }}" alt="">
                            <p class="diary-content">
                                不得不感叹一句 香港人对老婆真的是特！别！好！啊！ 室友男朋友是个港生 真的就是那种出门带纸巾带伞带外套冬天包里必备暖宝宝的那种 室友上学期学分不够 这学期决定超修
                                比我们多了五六节课 她男朋友只要是没课就陪她一起上课 一大早出门就看到她男朋友拿着早餐在寝室楼下等着…
                            </p>
                            <div class="bottom">
                                <a href="">1 &nbsp回复</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 校园风 -->
            <div style="background-color: #39E;	  width: 6px;margin-left:60px;"></div>
            <div style="background-color: #FF7F50;width: 6px;margin-left:5px;"></div>
            <div style="background-color: #FFFF00;width: 6px;margin-left:5px;"></div>

            <!-- 右边内容区域 -->
            <div class="sidebar col-md-3">
                <div class="sidebar-item">
                    <h1>03/07/2018</h1>
                    <h1>{{ $user->name }}</h1>
                    <a href=""><img src="{{ asset('img/b100192690.jpg') }}" alt=""></a>
                    <p style="margin-top:6px;">{{ $user->created_at }} &nbsp加入</p>
                    <p>{{ $user->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection