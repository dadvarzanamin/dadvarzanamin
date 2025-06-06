@extends('Admin.admin')
@section('title')
    <title> مدیریت کاربران سایت </title>
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
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">لیست کاربران</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2).'/'.'create')}}" class="btn btn-primary btn-xs">+ افزودن کاربر جدید </a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <style>
                                        table{margin: 0 auto;width: 100% !important;clear: both;border-collapse: collapse;table-layout: fixed;word-wrap:break-word;}
                                    </style>
                                    <table id="sample1" class="table table-striped table-bordered yajra-datatable">
                                        <thead>
                                        <tr>
                                            {{--<th class="wd-10p"> ردیف </th>--}}
                                            <th class="wd-10p"> تصویر </th>
                                            <th class="wd-10p"> نام و نام خانوادگی </th>
                                            <th class="wd-10p"> نام کاربری </th>
                                            <th class="wd-10p"> آدرس ایمیل </th>
                                            <th class="wd-10p"> موبایل </th>
                                            <th class="wd-10p"> تاریخ تولد </th>
                                            <th class="wd-10p"> زمان ثبت نام </th>
                                            <th class="wd-10p"> تغییر </th>
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
    @foreach($users as $user)
        <div id="myModal{{$user->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>آیا شما مطمعن از حذف این رکورد هستید؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">خیر</button>
                        <button type="button" id="deleteuser{{$user->id}}" class="btn btn-danger" data-id="{{$user->id}} " data-dismiss="modal">بله</button>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
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
                ajax: "{{ route('user-site-manage.index') }}",
                columns: [
                    //{data: 'DT_RowIndex' , name: 'DT_RowIndex'},
                    {data: 'imgdata'   , name: 'imgdata'},
                    {data: 'name'        , name: 'name'},
                    {data: 'username'    , name: 'username'},
                    {data: 'email'       , name: 'email'},
                    {data: 'phone'       , name: 'phone'},
                    {data: 'birthday'    , name: 'birthday'},
                    {data: 'date'        , name: 'date'},
                    {data: 'action'      , name: 'action', orderable: true, searchable: true},
                ]
            });

        });
    </script>
    @foreach($users as $user)
        <script>
            jQuery(document).ready(function(){
                jQuery('#deleteuser{{$user->id}}').click(function(e){
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ route('deleteuser') }}",
                        method: 'delete',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id   : jQuery(this).data("id"),

                        },
                        success: function (data) {
                            swal(data.subject, data.message, data.flag);
                            $('.yajra-datatable').DataTable().ajax.reload(null, false);
                        },
                        error: function (data) {
                            swal(data.subject, data.message, data.flag);
                        }
                    });
                });
            });
        </script>
    @endforeach
@endsection
