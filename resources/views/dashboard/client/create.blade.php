@extends('layouts.admin')

@section('content')

@section('content_header')
    <div class="flex justify-between items-center">
        <div class="text-lg font-bold">{{ trans('lang.client_create') }}</div>
        <a href="{{ route('dashboard.clients.index') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-4 ">
            {{ trans('lang.client_list') }}
        </a>
    </div>
@endsection
<div class="card">

    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="card-body">
        {!! Form::open(['route' => 'dashboard.clients.store']) !!}
        <div class="row">
            @include('dashboard.client.fields')
        </div>
        {!! Form::close() !!}
        <div class="clearfix"></div>

    </div>
</div>
@endsection
