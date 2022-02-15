<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/posts');//Primero la elimina para no tener muchas carpetas con muchas imagenes
        Storage::makeDirectory('public/posts'); //crea una carpeta en Storage
        
        User::create([
            'name' => 'root',
            'email' =>  'root@root.com', 
            'address' =>  'aisdjasoidjaosid',
            'password' =>  Hash::make('12345678'), 
        ]);
    }
}
