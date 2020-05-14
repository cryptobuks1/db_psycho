@extends('auth.admin.layouts.default')

@section('caption_name')
    Index
@endsection

@section('auth.admin.layouts.content')

    <div class="container body">
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <h1 style="text-align: center">
                            @if(isset($texts->firstWhere('caption_name', 'WelcomeAdminPanel')->caption_translation))
                            {{$texts->firstWhere('caption_name', 'WelcomeAdminPanel')->caption_translation}}
                            @endif
                        </h1>
                        <div class="title_left">
                            <h3>
                                {{--Chart Js--}}
                                {{--<small>--}}
                                    {{--Some examples to get you started--}}
                                {{--</small>--}}
                            </h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="clearfix"></div>
                </div>
            </div>
         </div>
    </div>



@endsection
