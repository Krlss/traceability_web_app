<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Supplier;
use App\Models\typeMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    public function __construct(){}

    function getProductByID($id){
         

        try {
            DB::beginTransaction();
            
            $product = Material::where('id', $id)->first();

            $data['product'] = $product;
            
            $supplier = Supplier::where('id', $product->supplier_id)->first();
            
            $data['supplier'] = $supplier;
            
            $typeMaterial = typeMaterials::where('id', $product->type_material_id)->first();
            
            $data['typeMaterial'] = $typeMaterial;
            

            return response()->json(['message'=>'Product data', 'data' => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(['message'=>'Something went error', 'data' => []], 500);
        }


    }
}
