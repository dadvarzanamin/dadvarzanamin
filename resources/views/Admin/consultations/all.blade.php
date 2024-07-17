@extends('Admin.admin')
@section('title')
    <title> {{$thispage['title']}} </title>
    <link href="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min-rtl.css')}} " rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('main')

    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
{{--                                <div class="row">--}}
{{--                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['list_title']}}</a></div>--}}
{{--                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2).'/'.'create')}}" class="btn btn-primary btn-xs">+--}}
{{--                                            {{$thispage['add_title']}}</a></div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="sample1" class="table table-striped table-bordered yajra-datatable">
                                        <thead>
                                        <tr>
                                            <th class="wd-10p"> سریال </th>
                                            <th class="wd-10p"> نام کاربر </th>
                                            <th class="wd-10p"> آدرس ایمیل </th>
                                            <th class="wd-10p"> شماره تماس </th>
                                            <th class="wd-10p"> موضوع پیام </th>
                                            <th class="wd-10p"> متن پیام </th>
                                        </tr>
                                        </thead>
                                        <tbody>
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
@endsection
@section('end')
    <script src="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route(request()->segment(2).'.'.'index')}}",
                columns: [
                    {data: 'id'       , name: 'id'},
                    {data: 'name'     , name: 'name'},
                    {data: 'email'    , name: 'email'},
                    {data: 'phone'    , name: 'phone'},
                    {data: 'title'    , name: 'title'},
                    {data: 'description'   , name: 'description'},
                ]
            });

        });
    </script>
@endsection

