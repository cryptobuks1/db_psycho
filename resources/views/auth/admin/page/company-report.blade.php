@extends('auth.admin.layouts.default')

@section('caption_name')
    Отчеты
@endsection

@section('auth.admin.layouts.content')

    <!-- page content -->
    <div class="right_col pageReport" role="main">
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
                            <h2>{{--<i class="fa fa-bars"></i>--}}{{ $texts->firstWhere('caption_name', 'BlockReport')->caption_translation }}</h2>

                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content"><br>

                            <div class="col-md-12">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="server">
                                        {{--<p class="lead">Home tab</p>--}}
                                        <div class="menuHeader">
                                            <div class="col-md-12">
                                                <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-company-send-request')}}"  >
                                                    {{ csrf_field() }}

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="TypeReport">@lang('MenuAdministeringReport.ReportFormCreateSelectType')<span class="required">*</span></label>
                                                        <div class="col-xs-7">

                                                            <select class="form-control" name="TypeReport" id="TypeReport" required>

                                                                @foreach($report_name as $name)
                                                                    <option class="col-xs-7" value="{{$name->name_report}}">
                                                                        @if ( \Illuminate\Support\Facades\Config::get('app.locale') == 'en')
                                                                            {{$name->en}}
                                                                        @elseif ( \Illuminate\Support\Facades\Config::get('app.locale') == 'ru' )
                                                                            {{$name->ru}}
                                                                        @endif
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{--{{dd($consumer)}}--}}


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CompanyReport">{{ $texts->firstWhere('caption_name', 'ReportFormCreateSelectCompany')->caption_translation }}<span class="required">*</span></label>
                                                        <div class="col-xs-7">
                                                            <select class="form-control" name="CompanyReport" id="CompanyReport" required>
                                                                <option></option>

                                                                    {{--@foreach($ACCESSCOMPANY as $company)--}}
                                                                            {{--<option class="col-xs-7" value="{{$company[0]}}" >{{$company[1]}}</option>--}}
                                                                     {{--@endforeach--}}

                                                                @foreach($accessCompanyAllArr as $company)
                                                                    <option class="col-xs-7" value="{{$company[0]}}" >{{$company[1]}}</option>
                                                                @endforeach

                                                                {{--@if (($consumer->IsAdmin) == 1 or ($consumer->IsAdmin) == 2)--}}
                                                                    {{--@foreach($report_companys as $company)--}}
                                                                        {{--<option class="col-xs-7" value="{{$company->id}}" >{{$company->company_full_name}}</option>--}}
                                                                    {{--@endforeach--}}
                                                                {{--@endif--}}

                                                                {{--@if (($consumer->IsAdmin) ==  3)--}}
                                                                    {{--<option class="col-xs-7" value="{{$report_companys->id}}" >{{$report_companys->company_full_name}}</option>--}}
                                                                {{--@endif--}}
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="StartDateReport">{{ $texts->firstWhere('caption_name', 'ReportFormCreateStartDate')->caption_translation }}<span class="required">*</span></label>
                                                        <div class="col-xs-2">
                                                            <input type="date"  name="StartDateReport" id="StartDateReport" value="{{ Carbon\Carbon::now()->startOfYear()->format('Y-m-d')}}"
                                                                   required="required" class="form-control col-md-7 col-xs-12">
                                                        </div>

                                                        <label class="control-label col-md-1" for="EndDateReport">{{ $texts->firstWhere('caption_name', 'ReportFormCreateEndDate')->caption_translation }}<span class="required">*</span></label>
                                                        <div class="col-xs-2">
                                                            <input type="date"  name="EndDateReport" id="EndDateReport" value="{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}"
                                                                   required="required" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="LanguageReport">{{ $texts->firstWhere('caption_name', 'ReportFormCreateSelectLng')->caption_translation }}<span class="required">*</span></label>
                                                        <div class="col-xs-7">
                                                            <select class="form-control" name="LanguageReport" id="LanguageReport">
                                                                <option class="col-xs-7" value="EN" >EN</option>
                                                                <option class="col-xs-7" value="RU" >RU</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="formatReport">Select format {{--{{ $texts->firstWhere('caption_name', 'ReportFormCreateSelectLng')->caption_translation }}--}}<span class="required">*</span></label>
                                                        <div class="col-xs-7">
                                                            <select class="form-control" name="formatReport" id="formatReport">
                                                                <option class="col-xs-7" value="html">html</option>
                                                                <option class="col-xs-7" value="pdf">pdf</option>
                                                                <option class="col-xs-7" value="xlsx">excel</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                        <div class="col-xs-1 col-sm-offset-5"><br>
                                                            <button type="submit"  class="btn btn-success SendRequest">{{ $texts->firstWhere('caption_name', 'ReportFormCreateSendRequest')->caption_translation }}</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                            <div class="tab-content menuHeader">
                                                <div id="reportGet" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <div id="modalReport"></div>
                                                        <table class="table table-data" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'BlockReportReport')->caption_translation }}</h3>
                                                                 <tr>
                                                                    <th style="width: 13%" scope="col">{{ $texts->firstWhere('caption_name', 'ReportTableTypeReport')->caption_translation }}</th>
                                                                    <th style="width: 4%" scope="col">{{ $texts->firstWhere('caption_name', 'ReportTableLanguageReport')->caption_translation }}</th>
                                                                    <th style="width: 5%"  scope="col">{{ $texts->firstWhere('caption_name', 'ReportTableOrganizationReport')->caption_translation }}</th>
                                                                    <th style="width: 6%" scope="col">{{ $texts->firstWhere('caption_name', 'ReportTableTypeFileReport')->caption_translation }}</th>
                                                                    <th style="width: 8%" scope="col">{{ $texts->firstWhere('caption_name', 'ReportTablePeriodReport')->caption_translation }}</th>
                                                                    <th style="width: 5%" scope="col">{{ $texts->firstWhere('caption_name', 'ReportTableStatusReport')->caption_translation }}</th>
                                                                    <th style="width: 9%" scope="col">{{ $texts->firstWhere('caption_name', 'ReportTableDateCreateReport')->caption_translation }}</th>
                                                                    <th style="width: 8%" scope="col"></th>
                                                                    <th style="width: 6%" scope="col"></th>
                                                                    <th style="width: 6%" scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(($consumer->IsAdmin) == 1 or ($consumer->IsAdmin) == 2)
                                                                @if(isset($report) or !empty($report))
                                                                    @foreach($report as $rep )
                                                                        @foreach($rep->reports as $item)
                                                                            <tr class="tr-data" data-id="{{$item->id}}">
                                                                                <td style="width: 13%">
                                                                                    @if(!empty($item->report_name))
                                                                                        @lang('nameReports.'.$item->report_name)
                                                                                    @endif</td>
                                                                                <td style="width: 4%" > @if(!empty($item->report_lng)){{$item->report_lng}} @endif</td>
                                                                                <td style="width: 5%" >@if(!empty($item->report_organisation)){{$item->report_organisation}}@endif</td>
                                                                                <td style="width: 6%" >@if(!empty($item->report_format)){{$item->report_format}}@endif</td>
                                                                                <td style="width: 8%">
                                                                                    @if(!empty($item->report_start_date))
                                                                                        @if ( \Illuminate\Support\Facades\Config::get('app.locale') == 'en')
                                                                                            {{\Carbon\Carbon::parse($item->report_start_date)->format('m-d-Y')}} / {{\Carbon\Carbon::parse($item->report_end_date)->format('m-d-Y')}}

                                                                                        @elseif ( \Illuminate\Support\Facades\Config::get('app.locale') == 'ru' )
                                                                                            {{\Carbon\Carbon::parse($item->report_start_date)->format('d.m.Y')}} / {{\Carbon\Carbon::parse($item->report_end_date)->format('d.m.Y')}}

                                                                                        @endif
                                                                                    @endif</td>
                                                                                <td style="width: 5%" >@if(!empty($item->report_name)){{$item->report_status}}  {{--@lang('nameReports.status')--}} @endif</td>
                                                                                <td style="width: 9%">
                                                                                    @if(!empty($item->created_at))
                                                                                        @if ( \Illuminate\Support\Facades\Config::get('app.locale') == 'en')
                                                                                            {{\Carbon\Carbon::parse($item->created_at)->format('m-d-Y H:i:s') }}

                                                                                        @elseif ( \Illuminate\Support\Facades\Config::get('app.locale') == 'ru' )
                                                                                            {{\Carbon\Carbon::parse($item->created_at)->format('d.m.Y H:i:s') }}
                                                                                        @endif
                                                                                    @endif
                                                                                </td>

                                                                                <td style="width: 5%">
                                                                                    @if(!empty($item->created_at)  and ($item->report_format  == 'html'))
                                                                                        <button type="button"
                                                                                                style="display: {{$item->report_file != NULL ? 'block' : 'none'}}" data-id="{{$item->id}}"
                                                                                                class="btn btn-info btn-lg buttonRepost button-show"
                                                                                                data-toggle="modal"
                                                                                                data-target="#ModalReport{{$item->id}}">@lang('MenuAdministeringReport.ButtonShow')</button>
                                                                                    @endif
                                                                                </td>
                                                                                <td {{--class="col-md-1"--}} style="width: 8%">
                                                                                    @if(!empty($item->created_at))

                                                                                        @if($item->report_format == 'html')

                                                                                            <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-download-html')}}" >
                                                                                                {{ csrf_field() }}
                                                                                                <input type="hidden" name="IdReportHtml" value="{{$item->id}}">
                                                                                                <button type="submit" style="display: {{$item->report_file != NULL ? 'block' : 'none'}}" data-id="{{$item->id}}"  class="btn btn-warning btn-lg buttonRepost"> @lang('MenuAdministeringReport.ButtonSaveAsHtml')</button>
                                                                                            </form>
                                                                                        @endif

                                                                                        @if($item->report_format == 'pdf')

                                                                                            <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-download-pdf')}}" >
                                                                                                {{ csrf_field() }}
                                                                                                <input type="hidden" name="IdReportPdf" value="{{$item->id}}">
                                                                                                <button type="submit"
                                                                                                        style="display: {{$item->report_file != NULL ? 'block' : 'none'}}" data-id="{{$item->id}}"
                                                                                                        class="btn btn-warning btn-lg buttonRepost"> @lang('MenuAdministeringReport.ButtonSaveAsPdf')</button>
                                                                                            </form>
                                                                                        @endif

                                                                                        @if($item->report_format  == 'xlsx')

                                                                                            <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-download-xlsx')}}" >
                                                                                                {{ csrf_field() }}
                                                                                                <input type="hidden" name="IdReportXlsx" value="{{$item->id}}">
                                                                                                <button type="submit"
                                                                                                        style="display: {{$item->report_file != NULL ? 'block' : 'none'}}" data-id="{{$item->id}}"
                                                                                                        class="btn btn-warning btn-lg buttonRepost"> @lang('MenuAdministeringReport.ButtonSaveAsXls')</button>
                                                                                            </form>
                                                                                        @endif
                                                                                    @endif
                                                                                </td>

{{--                                                                            @if(!empty($item->created_at)  and ($item->report_file != NULL))--}}

                                                                                <td {{--class="col-md-1"--}} style="width: 6%">
                                                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-report-delete')}}" >
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="ReportDeleteId" value="{{$item->id}}">
                                                                                        <button type="submit"  class="btn btn-danger btn-lg buttonRepost">@lang('MenuAdministeringReport.ButtonDelete')</button>
                                                                                    </form>
                                                                                </td>
                                                                                {{--@endif--}}
                                                                            </tr>
                                                                        @endforeach
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                            @if(($consumer->IsAdmin) == 3)
                                                                @if(isset($report) or !empty($report))
                                                                    @foreach($report['0']->reports as $item)
                                                                        <tr>
                                                                            <td style="width: 10%">@if(!empty($item->report_name)){{$item->report_name}} @endif</td>
                                                                            <td style="width: 5%" > @if(!empty($item->report_lng)){{$item->report_lng}} @endif</td>
                                                                            <td style="width: 5%" >@if(!empty($item->report_organisation)){{$item->report_organisation}}@endif</td>
                                                                            <td style="width: 5%" >@if(!empty($item->report_format)){{$item->report_format}}@endif</td>
                                                                            <td style="width: 10%">@if(!empty($item->report_date)){{$item->report_date}}@endif</td>
                                                                            <td style="width: 5%" >@if(!empty($item->report_name)) Сформирован @endif</td>
                                                                            <td style="width: 10%">@if(!empty($item->created_at)){{$item->created_at}} @endif </td>
                                                                            <td style="width: 5%">
                                                                                @if(!empty($item->created_at))
                                                                                    <button type="button" class="btn btn-info btn-lg buttonRepost" data-toggle="modal" data-id="{{$item->id}}" data-target="#ModalReport{{$item->id}}">@lang('MenuAdministeringReport.ButtonShow')</button>
                                                                                @endif
                                                                            </td>
                                                                            <td {{--class="col-md-1"--}} style="width: 6%">
                                                                                @if(!empty($item->created_at))
                                                                                    <button type="button" class="btn btn-warning btn-lg buttonRepost">@lang('MenuAdministeringReport.ButtonSaveAs')</button>
                                                                                @endif
                                                                            </td>

                                                                            <td {{--class="col-md-1"--}} style="width: 5%">
                                                                                <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-report-delete')}}" >
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="ReportDeleteId" value="{{$item->id}}">
                                                                                    <button type="submit" class="btn btn-danger btn-lg buttonRepost">@lang('MenuAdministeringReport.ButtonDelete')</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </div>
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

    {{--------}}



    <script>
        $(document).on('click', '.buttonRepost', function() {

            var id = $(this).attr('data-id');

            console.log(id);

            $.ajax({
                method: "POST",
                url: "/report/html/file/modal/ajax",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                success: function(response){
//                    console.log(response);
                    $('#modalReport').empty();

                    $('#modalReport').append(
                        response
                    );
                }
            });
        });

        /*--------------*/

        var ids = [];

        $( ".tr-data" ).each(function( index ) {
            ids.push($( this ).attr('data-id'));
        });

        setInterval(function () {

            $.ajax({
                method: "POST",
                url: "/admin/company/report/get-updated-data",
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: ids,
                },
                success: function(response){

                    $.each( response, function( key, value ) {

                        if (value) {
                            $("tr").find("[data-id='" + key + "']").show();
                        }
                    });
                }
            });
        }, 5000);


        $(document).on('click', '.RequestAjax', function() {

            var id = $(this).attr('data-id');

            console.log(id);

            $.ajax({
                method: "POST",
                url: "/report/html/file/modal/ajax",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                success: function(response){
//                    console.log(response);
                    $('#modalReport').empty();

                    $('#modalReport').append(
                        response
                    );
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
