<?php

namespace App\Http\Controllers;

use App\Events\ClientAddedEvent;
use App\Models\Client;
use App\Models\User;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch data from database
        $clients = Client::where('id_user', '=', Auth::id())->get();
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Gate::allows('create', Client::class))
            return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        //
        if(Gate::allows('create', Client::class))
        {
            $validatedData = $request->validate([
                'fName' => 'required|max:255',
                'lName' => 'required|max:255',
                'address' => 'required|max:255',
                'email' => 'required|email'
            ]);
            
            $validatedData['id_user'] = Auth::id();
            $result = Client::create($validatedData);
                //var_dump($validatedData);
                
                //dd($result);
            event(new ClientAddedEvent($validatedData['email'], $validatedData['id_user']));
          
            
            return  redirect('/clients')->with('success', 'Klient został dodany prawidłowo');
        } else {
            abort(403);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

        if(Gate::allows('view', $client))
        {
            return view('clients.details', ['client' => $client]);
        } else {
            abort(403);
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        if(Gate::allows('update', $client)) {
        return view('clients.edit', ['client' => $client]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        if(Gate::allows('update', $client)) {
            $validatedData = $request->validate([
                'fName' => 'required|max:255',
                'lName' => 'required|max:255',
                'address' => 'required|max:255',
                'email' => 'required|email'
            ]);
    
            Client::whereId($client->id)->update($validatedData);
    
            return redirect('/clients')->with('success', 'Dane klienta zostały zmienione prawidłowo');
        } else {
            abort(403);
            return false;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if(Gate::allows('delete', $client))
        {
            $client->delete();

            return redirect('/clients')->with('success', 'Klient został poprawnie usunięty');
        } else {
            abort(403);
        }
        
    }
}
