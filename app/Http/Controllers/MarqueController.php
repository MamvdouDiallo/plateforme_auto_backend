<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Marque;

class MarqueController extends Controller
{

    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->responseData(
            '',
            Response::HTTP_ACCEPTED,
            "",
            Marque::all()
        );
    }

    public function getVehicules(Request $request){
        $vehicules = Vehicule::where('marque_id', $request->id)->get();
        return $this->responseData(
            '',
            Response::HTTP_ACCEPTED,
            "",
            $vehicules
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
