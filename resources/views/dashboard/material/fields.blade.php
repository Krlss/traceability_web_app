<div class="w-full">
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

    <!-- Name Field -->
    <div class="w-full flex flex-row">

        <div class="flex flex-col px-2">
            {!! Form::label('name', trans('lang.product_image'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
            <div class="flex items-center justify-center flex-col">
                <div>
                    <img width="200" height="200" name='picture' id="picture" src="" class="max-w-xs" />
                </div>
                <label for="stock_image"
                    class="uppercase text-xs font-bold mt-2 bg-blue-500 px-4 py-2 text-white cursor-pointer">{{ trans('lang.select_image') }}</label>
                <input name="stock_image" id='stock_image' type="file" accept="image/*" hidden />
            </div>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-right">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-3"><i
                class="fa fa-save"></i> {{ trans('lang.save') }}</button>
    </div>

</div>

@push('scripts_lib')
    <script>
        document.getElementById("stock_image").addEventListener('change', changeImage);

        function changeImage(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endpush
