@extends('layouts.admin')

@section('content')
    @push('css_lib')
        <link rel="stylesheet" href="{{ asset('plugins/datatable/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/responsive.bootstrap4.min.css') }}">
    @endpush
@section('content_header')
    <div class="flex justify-between items-center">
        <div class="text-lg font-bold">{{ trans('lang.provider_list') }}</div>
        <a href="{{ route('dashboard.provides.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-4 ">
            {{ trans('lang.provider_create') }}
        </a>
    </div>
@endsection
<div class="card">
    <div class="card-body">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        <table id="providers" class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('lang.table_provider_id') }}</th>
                    <th>{{ trans('lang.table_provider_name') }}</th>
                    <th>{{ trans('lang.table_created') }}</th>
                    <th>{{ trans('lang.table_updated') }}</th>
                    <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                    <tr>
                        <td>{{ $provider->id }}</td>
                        <td>{{ $provider->name }}</td>
                        <td>{{ $provider->created_at->diffForHumans() }}</td>
                        <td>{{ $provider->updated_at->diffForHumans() }}</td>
                        <td class="flex items-center justify-center">
                            <a href="{{ route('dashboard.provides.edit', $provider) }}" class='btn btn-link'>
                                <i class="fas fa-edit text-gray-500 hover:text-gray-700  cursor-pointer"></i>
                            </a>

                            {!! Form::open(['route' => ['dashboard.provides.destroy', $provider], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash text-gray-500 hover:text-gray-700"></i>', [
    'type' => 'submit',
    'class' => '',
    'onclick' => "return confirm('Estás seguro que deseas eliminar a $provider->name')",
]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts_lib')
<script src="{{ asset('plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
<script>
    $('#providers').DataTable({
        columnDefs: [{
            orderable: false,
            targets: -1,
        }],
        responsive: true,
        autoWidth: false,
    });
</script>
@endpush
