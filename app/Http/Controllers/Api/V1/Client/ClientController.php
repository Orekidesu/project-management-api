<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use App\Http\Requests\Api\V1\Client\UpdateClientRequest;
use App\Http\Resources\Api\V1\Client\ClientResource;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $clients = Client::withCount('projects')->paginate();

            return ClientResource::collection($clients)->additional([
                'message' => 'clients retrieved successfully',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'failed to retrieved clients',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //
        try {
            $client = Client::create($request->validated());

            return (new ClientResource($client))->additional([
                'message' => 'client created successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'failed to create client',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        try {

            $client->load('projects');
            return (new ClientResource($client))->additional([
                'message' => 'client retrieved successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'failed to retrieve client',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
        try {

            $client->update($request->validated());

            return (new ClientResource($client))->additional([
                'message' => 'client updated successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'failed to update client',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        try {

            $client->delete();
            return response()->json([
                'message' => 'client deleted successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'failed to delete client',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
