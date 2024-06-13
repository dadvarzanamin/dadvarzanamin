@extends('Admin.admin')
@section('title')
    <title>{{$thispage['title']}}</title>
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['edit_title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $customertypes->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="customer_id" id="customer_id" data-required="1" value="{{$customertypes->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام برند</p>
                                                    <input type="text" name="name" id="name" value="{{$customertypes->name}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div  class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="submit"  class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>

@endsection

