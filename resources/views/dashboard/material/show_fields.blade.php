<div>
    <div class="form-group w-full flex justify-center items-center">
              
        @isset($material->image)
            <div class="mr-5">
                <img class="max-w-xs" width="175" height="175" src={{ asset('storage/' . $material->image->url) }} />
            </div>
        @else
            <div class="mr-5">
                <img class="max-w-xs" width="175" height="175" src="{{ asset('not_image.jpg') }}" />
            </div>
        @endisset

        {!! QrCode::size(175)->generate(
    'Nombre del producto: ' .
        $material->name .
        '
        Tipo del material: ' .
        $material->typeMaterial->name,
) !!}
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        
        <div class="form-group flex-col">
            {!! Form::label('material_name', trans('lang.material_name'), ['class' => '  ']) !!}
            <div class="">
                <p>
                    {!! $material->name !!}
                </p>
            </div>
        </div>

        <div class="form-group flex-col">
            {!! Form::label('table_supplier', trans('lang.table_supplier'), ['class' => '  ']) !!}
            <div class="">
                <p>
                    {!! $material->supplier ? $material->supplier->name : null !!}
                </p>
            </div>
        </div>

        <div class="form-group flex-col">
            {!! Form::label('typeMaterial_name', trans('lang.typeMaterial_name'), ['class' => '  ']) !!}
            <div class="">
                <p>
                    {!! $material->typeMaterial ? $material->typeMaterial->name : null !!}
                </p>
            </div>
        </div>
     

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2">
        <div class="form-group flex-col">
            {!! Form::label('table_supplier', trans('lang.table_created'), ['class' => '  ']) !!}
            <div class="">
                <p>
                    {!! $material->created_at !!}
                </p>
            </div>
        </div>

        <div class="form-group flex-col">
            {!! Form::label('typeMaterial_name', trans('lang.table_updated'), ['class' => '  ']) !!}
            <div class="">
                <p>
                    {!! $material->updated_at !!}
                </p>
            </div>
        </div>

    </div>
</div>
