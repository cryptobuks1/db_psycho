@extends('auth.admin.layouts.default')

@section('caption_name')
    БД
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
                            <h2>{{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content">
                            <br>
                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="language">
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#Get">{{ $texts->firstWhere('caption_name', 'langAll')->caption_translation }} </a></li>
                                                <li><a href="{{route('admin-type-access-show')}}">{{ $texts->firstWhere('caption_name', 'Add')->caption_translation }}</a></li>
                                                {{--<li><a>{{ $texts->firstWhere('caption_name', 'Delete')->caption_translation }}</a></li>--}}
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="Get" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}</h3>
                                                            <tr>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'InfoTypeName')->caption_translation }}</th>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'InfoTypeCode')->caption_translation }}</th>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'Action')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($access as $a)
                                                            <table class="table" style="text-align: left">
                                                                <tbody>
                                                                <tr>
                                                                    <th class="col-md-3">{{$a->access_type_name}}</th>
                                                                    <th class="col-md-3">{{$a->access_type_code}}</th>
                                                                    <th>
                                                                        <form action="{{route('admin-type-access-show')}}">
                                                                            <button name="ConsumerId" class="btn btn-success btn-detail open_modal" value="{{$a['id']}}">Info</button>
                                                                        </form>
                                                                        <form action="{{route('admin-type-access-show')}}">
                                                                            <button name="ConsumerId" class="btn btn-warning btn-detail open_modal" value="{{$a['id']}}">Edit</button>
                                                                        </form>
                                                                        <form method="POST" action="{{route('admin-type-access-delete')}}" >
                                                                            <button name="accContractorDeleteId"  class="btn btn-danger btn-delete delete-product" value="{{$a['id']}}">Delete</button>
                                                                        </form>
                                                                    </th>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-lang-delete')}}" >
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="deleteLang" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- footer content -->

                @include('auth.admin.layouts.footer')
                <!-- /footer content -->
                </div>
@endsection
