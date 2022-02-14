<!-- Name Field -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 w-full">

    <div class="flex flex-col px-2">
        {!! Form::label('name', trans('lang.client_name'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::text('name', $client ? $client->name : null, ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.client_name'), 'required' => true]) !!}
            <div class="text-gray-500 text-sm mb-2">
                {{ trans('lang.client_name_required') }}
            </div>
        </div>
    </div>

    <div class="flex flex-col px-2">
        {!! Form::label('last_name', trans('lang.client_last_name'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::text('last_name', $client ? $client->last_name : null, ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.client_last_name'), 'required' => true]) !!}
            <div class="text-gray-500 text-sm mb-2">
                {{ trans('lang.client_last_name_required') }}
            </div>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 w-full">

    <div class="flex flex-col px-2">
        {!! Form::label('email', trans('lang.client_email'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::text('email', $client ? $client->email : null, ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.client_email'), 'required' => true]) !!}
            <div class="text-gray-500 text-sm mb-2">
                {{ trans('lang.client_email_required') }}
            </div>
        </div>
    </div>

    <div class="flex flex-col px-2">
        {!! Form::label('phone', trans('lang.client_phone'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::input('number', 'phone', old('phone'), ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.phone'), 'required' => true]) !!}        </div>
    </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 w-full">

    <div class="flex flex-col px-2">
        {!! Form::label('business', trans('lang.client_business'), ['class' => 'uppercase text-xs font-bold mb-2']) !!}
        <div class="">
            {!! Form::text('business', $client ? $client->business : null, ['class' => 'form-control border-1 border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent rounded-sm', 'placeholder' => trans('lang.client_business')]) !!}
        </div>
    </div> 

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md font-semibold px-3"><i
            class="fa fa-save"></i> {{ trans('lang.save') }}</button>
</div>
