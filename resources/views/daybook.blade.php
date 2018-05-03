@extends('layouts.app')

@section('link')
    <link href="{{ asset('css/covers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="page-main" class="container">
        <link rel="stylesheet" href="{{ asset('css/date_input.css') }}" type="text/css">
        <style>
            .tip {
                cursor: help;
                padding: 9px;
            }

            .tooltip {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 3;
                display: none;
                background-color: #F5F5B5;
                border: 1px solid #DECA7E;
                padding: 10px;
                width: 240px;
                color: #333;
            }

            .tips-highlight {
                width: 350px;
            }

            #whats_expired:hover::before {
                content: attr(abc);
                background-color: #cfd583;
                color: white;
                position: absolute;
                left: 5%;

            }

            /*.tip:hover::before {*/
                /*content: attr(tip);*/
                /*background-color: #d9444a;*/
                /*color: white;*/
                /*position: absolute;*/
                /*!*left:5%;*!*/
                /*left: 356px;*/
                /*top: 256.2px;*/
            /*}*/
        </style>
        <div id="page-main" class="container">
            <h1 class="page-header">创建日记本</h1>
            <div class="sidebar" style="width:450px;">
                <div class="sidebar-item">
                    <h2 class="title">什么是囊囊日记？</h2>
                    <p>
                        <b>囊囊日记</b>是一个记录生活的日记本。<br>
                        <br>
                        首先你需要建立一个囊囊日记本，公开或是私密，并为它设定一个期限，这个期限决定了这个日记本的“厚度”，然后你就可以开始写日记了。
                        你可以在上面记录喜悦，悲伤，发牢骚，流水账，甚至只是一张相片，一条电话号码。
                        之后你会发现，<b>一觉醒来，前一天你和所有人的日记都不见了</b>，放心，它们并没有被删除，只是存放在你建好的日记本里，
                        等到日记本“写满”那天，你所有的日记就都可以再次被浏览。<br>
                        <br>
                        我们欢迎真实生活的记录，欢迎心血来潮，不鼓励转载，不鼓励冲动灌水。<br>
                    </p>
                </div>
            </div>
            <div class="main" style="width: auto">
                <form action="{{route('save')}}" method="post" accept-charset="utf-8" class="col-md-4"
                      style="margin-top:10px;" enctype="multipart/form-data">
                    {{--定义csrf保护--}}
                    {{--                    {{ csrf_field() }}--}}
                    @csrf
                    <div class="err">
                    </div>
                    <label>主题</label>
                    <input type="text" id="subject" name="Daybook[thetheme]" value="">
                    <p></p>
                    <p>
                        <label for="description">描述</label>
                        <textarea id="description" name="Daybook[describe]" cols="20" rows="2"></textarea>
                    </p>

                    <label>过期时间</label>
                    <input type="date" id="shfsStartDate" name="Daybook[expirationtime]" class="date_input" value="">
                    <a id="whats_expired" class="tip"
                       tip="给日记本设置一个完结日期，日记本完结后你才能浏览该日记本的所有日记，在此之前，每天凌晨零点，你写的日记将被隐藏，包括你自己在内任何人都无法浏览。">这是什么?
                        <div class="tooltip fixed" style="left: 356px; top: 256.2px; display: none;">
                            给日记本设置一个完结日期，日记本完结后你才能浏览该日记本的所有日记，在此之前，每天凌晨零点，你写的日记将被隐藏，包括你自己在内任何人都无法浏览。
                        </div>
                    </a>
                    <p></p>

                    <label>谁可以看到这个日记本？</label>
                    <select name="Daybook[who]">
                        <option value="0">大家</option>
                        <option value="1">我自己</option>
                    </select>
                    <p><input class="btn-submit" type="submit" value="创建日记本">
                        <input class="btn-cancel" type="button"
                               value="取消"
                               onclick="javascript:history.back(-1);">
                    </p>
                </form>
            </div>
        </div>

        {{--<script src="{{ asset('js/jquery.date_input.js') }}"></script>--}}
        {{--<script src="{{ asset('js/jquery.date_input.zh_CN.js') }}"></script>--}}
        <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
        <script src="{{ asset('js/jquery.simpletip-1.3.1.min.js') }}"></script>
        <script type="text/javascript">
            window.onload = function () {
                var date = new Date();
                // 获取当前年份
                var year = date.getFullYear();
                //获取当前月份 0-11 0对应1月
                var month = date.getMonth() + 2;
                //获取当前日期
                var day = date.getDate();
                //格式为"yyyy-MM-dd" 需做处理
                if (month < 10) {
                    month = "0" + month;
                }
                if (day < 10) {
                    day = "0" + day;
                }
                $("#shfsStartDate").val(year + "-" + month + "-" + day);
            }

            var $expTip = $('#whats_expired');
            // console.log($expTip);
            $expTip.simpletip({ content:$expTip.attr('tip'), fixed: true, position: 'right' });
        </script>
    </div>
@endsection

@section('footer')

@endsection