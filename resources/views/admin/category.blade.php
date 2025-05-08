@extends('admin-layout')

@section('title', 'AdminDashboard')

@section('content')
    <div name="header">
        <b>
            {{ __('AdminDashboard') }}
        </b>
    </div>

    <div>
        <div class="">
            {{ __("Category") }}
        </div>
    </div>
@endsection
