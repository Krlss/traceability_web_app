<!-- Name Field -->
<div class="form-group col-12">
    {!! Form::label('name', trans('lang.typeMaterial_name'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
    <div class="">
        {!! Form::text('name', $typematerial ? $typematerial->name : null, ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.typeMaterial_name'), 'required' => true]) !!}
        <div class="text-gray-500 text-sm mb-2">
            {{ trans('lang.typeMaterial_required') }}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-3"><i
            class="fa fa-save"></i> {{ trans('lang.save') }}</button>
</div>
