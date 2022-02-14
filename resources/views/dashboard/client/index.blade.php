@extends('layouts.admin')

@section('content')
    @push('css_lib')
        <link rel="stylesheet" href="{{ asset('plugins/datatable/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/responsive.bootstrap4.min.css') }}">
    @endpush
@section('content_header')
    <div class="flex justify-between items-center">
        <div class="text-lg font-bold">{{ trans('lang.client_list') }}</div>
        <a href="{{ route('dashboard.clients.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-4 ">
            {{ trans('lang.client_create') }}
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

        <table id="clients" class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('lang.table_client_names') }}</th> 
                    <th>{{ trans('lang.table_client_email') }}</th>
                    <th>{{ trans('lang.table_client_phone') }}</th>
                    <th>{{ trans('lang.table_client_business') }}</th>
                    <th>{{ trans('lang.table_updated') }}</th>
                    <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name . ' ' . $client->last_name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->business }}</td>
                        <td>{{ $client->updated_at->diffForHumans() }}</td>
                        <td class="flex items-center justify-center">
                            <a href="{{ route('dashboard.clients.edit', $client) }}" class='btn btn-link'>
                                <i class="fas fa-edit text-gray-500 hover:text-gray-700  cursor-pointer"></i>
                            </a>

                            {!! Form::open(['route' => ['dashboard.clients.destroy', $client], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash text-gray-500 hover:text-gray-700"></i>', [
    'type' => 'submit',
    'class' => '',
    'onclick' => "return confirm('Estás seguro que deseas eliminar a $client->name')",
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
    $('#clients').DataTable({
        columnDefs: [{
            orderable: false,
            targets: -1,
        }],
        responsive: true,
        autoWidth: false,
    });
</script>
@endpush
