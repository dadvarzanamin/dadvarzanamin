@extends('admin')
@section('main')

    <form method="GET" action="{{ route('pay') }}">
        @csrf
        <label>مبلغ شارژ (ریال):</label>
        <input type="text" name="amount" required>

        <label>توضیحات (اختیاری):</label>
        <input type="text" name="description">

        <button type="submit">پرداخت و شارژ کیف پول</button>
    </form>

@endsection
