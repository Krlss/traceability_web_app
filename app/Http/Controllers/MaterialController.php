<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Material;
use App\Models\Supplier;
use App\Models\typeMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::orderBy('updated_at', 'DESC')->get();
        return view('dashboard.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = null;
        $type_materials = typeMaterials::pluck('name', 'id');
        $suppliers = Supplier::pluck('name', 'id');
        $supplier = null;
        $type_material = null;
        return view('dashboard.material.create', compact('material', 'type_materials', 'suppliers', 'supplier', 'type_material'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMaterialRequest $request)
    {
        $input = $request->all(); 
        
        try {
            DB::beginTransaction();

            Material::create($input);

            DB::commit();  

            return redirect()->route('dashboard.materials.index')->with('info', trans('lang.material_created'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.material_error_created') . $th->getMessage());
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
    public function edit(Material $material)
    {
        
        $supplier = Supplier::where('id', $material->supplier_id)->first();

        $type_material = typeMaterials::where('id', $material->type_material_id)->first();

        $suppliers = Supplier::pluck('name', 'id');

        $type_materials = typeMaterials::pluck('name', 'id');

        return view('dashboard.material.edit', compact('material', 'supplier', 'type_material', 'suppliers', 'type_materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            $material->update($input);

            DB::commit();

            return redirect()->route('dashboard.materials.index')->with('info', trans('lang.material_updated'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.material_error_updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        try {
            
            DB::beginTransaction();
            $material->delete();
            DB::commit();
            return redirect()->route('dashboard.materials.index')->with('info', trans('lang.material_deleted'));
        } catch (\Throwable $e) {
            DB::rollBack();            
            return redirect()->back()->with('error', trans('lang.material_error'));
        } 
    }
}
