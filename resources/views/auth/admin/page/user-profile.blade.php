@extends('auth.admin.layouts.default')

@section('caption_name')
    User Profile
@endsection

@section('auth.admin.layouts.content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class=" col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{--<i class="fa fa-bars"></i>--}} {{ $texts->firstWhere('caption_name', 'UserData')->caption_translation }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content"><br>
                            <div class="col-md-2">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                {{--<ul class="nav nav-tabs tabs-left">--}}
                                    {{--<li class="active"><a href="#country" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'CountryRegCountry')->caption_translation }}</a></li>--}}

                                {{--</ul>--}}
                            </div>

                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="country">
                                        {{--<p class="lead">Home tab</p>--}}
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#userProfileGet">{{ $texts->firstWhere('caption_name', 'userProfileGet')->caption_translation }}</a></li>
                                            </ul><br>

                                           {{-- {{dd($consumer)}}--}}

                                            <div class="tab-content menuHeader">
                                                <div id="userProfileGet" class="tab-pane fade in active">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-user-profile-update')}}" >
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{$consumer['id']}}" name="ConsumerId">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="profileConsumerName"> {{ $texts->firstWhere('caption_name', 'profileConsumerName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="profileConsumerName" value="{{$consumer['consumer_name']}}" maxlength="100"
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="profileName">  {{ $texts->firstWhere('caption_name', 'profileName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="profileName" value="{{$consumer['name']}}"
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="profileConsumerLogin">   {{ $texts->firstWhere('caption_name', 'profileConsumerLogin')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="profileConsumerLogin" maxlength="100"  value="{{$consumer['consumer_login']}}"
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="profilePhoneNumber"> {{ $texts->firstWhere('caption_name', 'profilePhoneNumber')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="profilePhoneNumber" maxlength="25" value="{{$consumer['phone_number']}}"
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" maxlength="100" for="profileEmail">email <span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="profileEmail" value="{{$consumer['email']}}"
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="profileEmail2">email2  {{--{{ $texts->firstWhere('caption_name', 'BlockCountryAddCountrySuserName')->caption_translation }}--}}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="profileEmail2" maxlength="100" value="{{$consumer['email']}}"
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                            <div class="col-xs-1 col-sm-offset-5"><br>
                                                                <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer content -->

        @include('auth.admin.layouts.footer')

        <!-- /footer content -->
    </div>
    <!-- /page content -->

@endsection
