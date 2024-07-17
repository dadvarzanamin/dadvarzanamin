@extends('admin')
@section('style')
    <title>تنظیمات حساب کاربری</title>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">ویرایش حساب کاربری</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="accordion" class="generic-accordion generic-accordion-layout-2">
                    @foreach($notifs as $notif)
                        <div class="card">
                            <div class="card-header" id="heading{{$notif->id}}">
                                <button class="btn btn-link collapsed read" data-toggle="collapse" @foreach($usernotifs as $usernotif) @if($usernotif->notif_id == $notif->id) @if($usernotif->active == 1) id="myButton" data-id="{{$notif->id}}"  onclick="readnotif(this)" style="background-color: #e3b6b6 !important;" @endif @endif @endforeach  data-target="#collapse{{$notif->id}}" aria-expanded="false" aria-controls="collapse{{$notif->id}}">
                                    <i class="la la-plus"></i>
                                    <i class="la la-minus"></i>
                                    {{$notif->title}}
                                </button>
                            </div>
                            <div id="collapse{{$notif->id}}" class="collapse" aria-labelledby="heading{{$notif->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <p class="card-text">{!! $notif->description !!} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
    <script>
        function readnotif(button) {
            var notificationId = button.getAttribute("data-id");
                $.ajax({
                    url : '{{ route( 'readnotif' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": notificationId
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        button.removeAttribute("style");
                        button.removeAttribute("onclick");
                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            };
    </script>
@endsection
