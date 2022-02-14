<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProviderRequest;
use App\Http\Requests\UpdatedProviderRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Contracts\Provider;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Supplier::orderBy('updated_at', 'DESC')->get();
        return view('dashboard.provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = null;
        return view('dashboard.provider.create', compact('provider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProviderRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            Supplier::create($input);

            DB::commit();  

            return redirect()->route('dashboard.provides.index')->with('info', trans('lang.provider_created'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.provider_error_created') . $th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $provider)
    {
        return view('dashboard.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedProviderRequest $request, Supplier $provider)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            $provider->update($input);

            DB::commit();

            return redirect()->route('dashboard.provides.index')->with('info', trans('lang.provider_updated'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.provider_error_updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
