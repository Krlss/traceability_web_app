@extends('layouts.admin')

@section('content')
    @push('css_lib')
        <link rel="stylesheet" href="{{ asset('plugins/datatable/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/responsive.bootstrap4.min.css') }}">
    @endpush
@section('content_header')
    <div class="flex justify-between items-center">
        <div class="text-lg font-bold">{{ trans('lang.typeMaterial_list') }}</div>
        <a href="{{ route('dashboard.typematerials.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-4 ">
            {{ trans('lang.typeMaterial_create') }}
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

        <table id="typeMaterials" class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('lang.table_typeMaterial_id') }}</th>
                    <th>{{ trans('lang.table_typeMaterial_name') }}</th>
                    <th>{{ trans('lang.table_created') }}</th>
                    <th>{{ trans('lang.table_updated') }}</th>
                    <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typematerials as $typematerial)
                    <tr>
                        <td>{{ $typematerial->id }}</td>
                        <td>{{ $typematerial->name }}</td>
                        <td>{{ $typematerial->created_at->diffForHumans() }}</td>
                        <td>{{ $typematerial->updated_at->diffForHumans() }}</td>
                        <td class="flex items-center justify-center">
                            <a href="{{ route('dashboard.typematerials.edit', $typematerial) }}" class='btn btn-link'>
                                <i class="fas fa-edit text-gray-500 hover:text-gray-700  cursor-pointer"></i>
                            </a>

                            {!! Form::open(['route' => ['dashboard.typematerials.destroy', $typematerial], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash text-gray-500 hover:text-gray-700"></i>', [
    'type' => 'submit',
    'class' => '',
    'onclick' => "return confirm('Estás seguro que deseas eliminar a $typematerial->name')",
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
    $('#typeMaterials').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ items por página",
            "zeroRecords": "No hay datos, lo sentimos",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "buscador",
        },
        columnDefs: [{
            orderable: false,
            targets: -1,
        }],
        responsive: true,
        autoWidth: false,
    });
</script>
@endpush
