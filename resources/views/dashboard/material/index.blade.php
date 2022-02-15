@extends('layouts.admin')

@section('content')
    @push('css_lib')
        <link rel="stylesheet" href="{{ asset('plugins/datatable/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatable/responsive.bootstrap4.min.css') }}">
    @endpush
@section('content_header')
    <div class="flex justify-between items-center">
        <div class="text-lg font-bold">{{ trans('lang.material_list') }}</div>
        <a href="{{ route('dashboard.materials.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-4 ">
            {{ trans('lang.material_create') }}
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

        <table id="materials" class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('lang.table_supplier') }}</th>
                    <th>{{ trans('lang.table_type') }}</th>
                    <th>{{ trans('lang.table_material_name') }}</th>
                    <th> QR CODE </th>
                    <th>{{ trans('lang.table_updated') }}</th>
                    <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                    <tr>
                        <td>{{ $material->supplier->name }}</td>
                        <td>{{ $material->typeMaterial->name }}</td>
                        <td>{{ $material->name }}</td>
                        <td>{!! QrCode::size(75)->generate('Nombre del producto: ' . $material->name . "\n" .'Tipo del material: ' . $material->typeMaterial->name . "\n" . 'Proveedor: ' . $material->supplier->name) !!}</td>
                        <td>{{ $material->updated_at->diffForHumans() }}</td>
                        <td class="flex items-center justify-center">

                            <a href="{{ route('dashboard.materials.show', $material) }}">
                                <i class="fas fa-eye text-gray-500 hover:text-gray-700 cursor-pointer"></i>
                            </a>

                            <a href="{{ route('dashboard.materials.edit', $material) }}" class='btn btn-link'>
                                <i class="fas fa-edit text-gray-500 hover:text-gray-700  cursor-pointer"></i>
                            </a>

                            {!! Form::open(['route' => ['dashboard.materials.destroy', $material], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash text-gray-500 hover:text-gray-700"></i>', [
    'type' => 'submit',
    'class' => '',
    'onclick' => "return confirm('Estás seguro que deseas eliminar a $material->name')",
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
    $('#materials').DataTable({
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
