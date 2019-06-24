@extends('layout')

@section('page-content')
    <example-component></example-component>
@endsection

@section('custom-script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection