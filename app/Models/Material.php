<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_material_id',
        'supplier_id'
    ];

    public static $rules = [
        'name' => 'required',
        'type_material_id' => 'required',
        'supplier_id' => 'required'
    ];

    public function typeMaterial()
    {
        return $this->belongsTo(typeMaterials::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
