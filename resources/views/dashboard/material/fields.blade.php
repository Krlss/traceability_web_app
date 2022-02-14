<!-- Name Field -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 w-full">

    <div class="flex flex-col px-2">
        {!! Form::label('name', trans('lang.material_name'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::text('name', $material ? $material->name : null, ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.material_name'), 'required' => true]) !!}
            <div class="text-gray-500 text-sm mb-2">
                {{ trans('lang.material_required') }}
            </div>
        </div>
    </div>

    <div class="flex flex-col px-2">
        {!! Form::label('type_material_id', trans('lang.type_material'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::select('type_material_id', $type_materials, $type_material ? $type_material->id : null, ['class' => 'select2 form-control', 'required' => true]) !!}
            <div class="text-gray-500 text-sm mb-2">{{ trans('lang.type_material_required') }}</div>
        </div>
        @error('type_material_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex flex-col px-2">
        {!! Form::label('supplier_id', trans('lang.supplier'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::select('supplier_id', $suppliers, $supplier ? $supplier->id : null, ['class' => 'select2 form-control', 'required' => true]) !!}
            <div class="text-gray-500 text-sm mb-2">{{ trans('lang.supplier_required') }}</div>
        </div>
        @error('supplier_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>



</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-3"><i
            class="fa fa-save"></i> {{ trans('lang.save') }}</button>
</div>
