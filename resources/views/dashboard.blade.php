@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
    Welcome to your application dashboard!
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/app1.js') }}" defer></script>
@endsection
