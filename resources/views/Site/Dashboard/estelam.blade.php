@extends('admin')
@section('style')
    <title>استعلامات</title>
    <style>
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }
        .styled-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .styled-table tbody tr:hover {
            background-color: #e0e0e0;
        }
        .loading-spinner {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #00a0d8;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">استعلامات</h3>
    </div>
    <ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">
        @foreach($estelams as $estelam)
            <li class="nav-item">
                <a class="nav-link" id="{{$estelam->title}}-tab" data-toggle="tab" href="#{{$estelam->title}}" role="tab" aria-controls="{{$estelam->title}}" aria-selected="false">{{$estelam->title_fa}}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">
        @foreach($estelams as $estelam)
        <div class="tab-pane fade" id="{{$estelam->title}}" role="tabpanel" aria-labelledby="{{$estelam->title}}-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">{{$estelam->title_fa}}</h3>
                <form method="post" action="{{route('queries')}}" class="row pt-40px" id="form{{$estelam->id}}">
                    @csrf
                    @foreach($subestelams as $subestelam)
                        @if($subestelam->estelam_id == $estelam->id)
                            <div class="input-box col-lg-3">
                                <label class="label-text">{{$subestelam->label}}</label>
                                <div class="form-group">
                                    <input required class="form-control form--control" type="{{$subestelam->type}}" name="{{$subestelam->name}}"  style="direction: rtl;text-align: left"/>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="input-box col-lg-12 py-2">
                        <button type="button" class="btn theme-btn send-form" data-form-id="{{$estelam->id}}">
                            <span class="loading-spinner"></span>دریافت استعلام
                        </button>
                    </div>
                </form>
                <div class="section-block mb-5"></div>
                <div class="response-container" id="responseContainer{{$estelam->id}}"></div>

            </div>
        </div>
        @endforeach
    </div>

@endsection
@section('script')
    <script>
        $('.send-form').click(function() {
            var formId = $(this).data('form-id');
            var formData = $('#form' + formId).serialize();
            formData += '&formId=' + formId;
            var tabId = $(this).closest('.tab-pane').attr('id');
            var responseContainer = $('#' + tabId + ' .response-container');
            var button = $(this);
            var spinner = $(this).find('.loading-spinner');

            spinner.css('display', 'inline-block');
            button.attr('disabled', true);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route("queries") }}',
                data: formData,
                success: function(response) {
                    console.log(response);
                    var tableHtml = '<table class="styled-table"><thead><tr><th>عنوان : </th><th>نتیجه</th></tr></thead><tbody>';

                    $.each(response.response, function(key, value) {
                        tableHtml += '<tr><td>' + key + '</td><td>' + value + '</td></tr>';
                    });
                    tableHtml += '</tbody></table>';

                    responseContainer.html(tableHtml);
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error);
                    Swal.fire({
                        title:'درخواست با خطا مواجه شد',
                        type: 'error',
                        text: 'لطفاً دوباره امتحان کنید.',
                        showConfirmButton: true,
                        confirmButtonText: 'متوجه شدم'
                    });
                    console.error('Error:', error);
                },
                complete: function() {
                    spinner.css('display', 'none');
                    button.attr('disabled', false);
                }
            });
        });
    </script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
@endsection
