<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('updated_at', 'DESC')->get();
        return view('dashboard.client.index', compact('clients')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = null;
        return view('dashboard.client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();
        
        try {
            DB::beginTransaction();

            Client::create($input);

            DB::commit();  

            return redirect()->route('dashboard.clients.index')->with('info', trans('lang.client_created'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.client_error_created') . $th->getMessage());
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
    public function edit(Client $client)
    {
        return view('dashboard.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            $client->update($input);

            DB::commit();

            return redirect()->route('dashboard.clients.index')->with('info', trans('lang.client_updated'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->with('error', trans('lang.client_error_updated'));
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
