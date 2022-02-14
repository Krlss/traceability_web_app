<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeMaterialRequest;
use App\Http\Requests\UpdatedMaterialTypeRequest;
use App\Models\typeMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typematerials = typeMaterials::orderBy('updated_at', 'DESC')->get();
        return view('dashboard.type.index', compact('typematerials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typematerial = null;
        return view('dashboard.type.create', compact('typematerial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeMaterialRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            typeMaterials::create($input);

            DB::commit();  

            return redirect()->route('dashboard.typematerials.index')->with('info', trans('lang.typeMaterial_created'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.typeMaterial_error_created') . $th->getMessage());
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
    public function edit(typeMaterials $typematerial)
    {
        return view('dashboard.type.edit', compact('typematerial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedMaterialTypeRequest $request, typeMaterials $typematerial)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            $typematerial->update($input);

            DB::commit();

            return redirect()->route('dashboard.typematerials.index')->with('info', trans('lang.typeMaterial_updated'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.typeMaterial_error_updated'));
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
