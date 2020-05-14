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
                                    <div class="menuHeader">
                                        <div class="tab-content menuHeader">
                                            {{--@foreach($ConsAccess as $CA)--}}

                                            <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-type-access-insert')}}" >
                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="AccessesAdd"> {{ $texts->firstWhere('caption_name', 'InfoTypeName')->caption_translation }}<span class="required">*</span></label>
                                                    <div class="col-xs-7">
                                                            <input type="text"  name="NameAdd" value=""
                                                             class="form-control col-md-7 col-xs-12" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="AccessesAdd"> {{ $texts->firstWhere('caption_name', 'InfoTypeCode')->caption_translation }}<span class="required">*</span></label>
                                                    <div class="col-xs-7">
                                                        <input type="text" name="CodeAdd" value=""
                                                               class="form-control col-md-7 col-xs-12" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                    <div class="col-xs-1 col-sm-offset-5"><br>
                                                        <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                    </div>
                                                </div>
                                            </form>
                                            {{--@endforeach--}}
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
