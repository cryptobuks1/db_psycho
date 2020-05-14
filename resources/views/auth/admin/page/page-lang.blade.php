@extends('auth.admin.layouts.default')

@section('caption_name')
    Lang
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
                            <h2>{{--{{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}--}}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content"><br>
                            <div class="col-md-2">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-left">
                                    <li class="active"><a href="#langName" data-toggle="tab">LANGUAGE NAME
                                            {{--{{ $texts->firstWhere('caption_name', 'AccOrganization')->caption_translation }}--}}
                                        </a>
                                    </li>

                                    <li><a href="#captionList" data-toggle="tab">Caption List
                                            {{--{{ $texts->firstWhere('caption_name', 'AccContractor')->caption_translation }}--}}
                                        </a>
                                    </li>

                                    <li><a href="#captionCode" data-toggle="tab">Caption Code
                                            {{--{{ $texts->firstWhere('caption_name', 'AccContractor')->caption_translation }}--}}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div id="langName" class="tab-pane fade in active">
                                        1
                                     </div>

                                    <div id="captionList" class="tab-pane fade in ">
                                        2
                                     </div>

                                    <div id="captionCode" class="tab-pane fade in ">
                                        3
                                     </div>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

            $('#ConsumerInfo').on('change', function() {
                var id = this.value;
                $.ajax({
                    method: "POST",
                    url: "/admin/update/contractor/modal/ajax",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#updatePage').empty();

                        $.each(response, function( key, info ) {
                            console.log(info.country.country_name);
                            $('#updatePage').append(
                                '<tr>'+
                                '<td style="font-size: 15pt" class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">Country: '+info.country.country_name+'</td>'+
                                '<td style="font-size: 15pt" class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">City: '+info.city_name+'</td>'+
                                '<td style="font-size: 15pt" class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">Phone: '+info.phone_number+'</td>'+
                                '</tr>'
                            );
                        });
                    }
                });
            });

            $('#CompanyInfo').on('change', function() {
                var id = this.value;
                $.ajax({
                    method: "POST",
                    url: "/admin/update/company/modal/ajax",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response) {
                       console.log(response);
                        $('#updatePage2').empty();

                        $.each(response, function( key, info2 ) {
                            console.log(info2.country.country_name);
                            $('#updatePage2').append(
                                '<tr>'+
                                '<td style="font-size: 15pt" class="col-md-3" data-toggle="modal" data-target="#myModal'+info2.id +'">Country: '+info2.country.country_name+'</td>'+
                                '<td style="font-size: 15pt" class="col-md-3" data-toggle="modal" data-target="#myModal'+info2.id +'">City: '+info2.city_name+'</td>'+
                                '<td style="font-size: 15pt" class="col-md-3" data-toggle="modal" data-target="#myModal'+info2.id +'">Phone: '+info2.phone_number+'</td>'+
                                '</tr>'
                            );
                        });
                    }
                });
            });
        </script>
        <!-- footer content -->

        @include('auth.admin.layouts.footer')

        <!-- /footer content -->
    </div>
    <!-- /page content -->

@endsection
