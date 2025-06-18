<?php

namespace App\Http\Controllers;

use App\Models\ModelVehicule;
use App\Models\Vehicule;
use App\traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModelController extends Controller
{

    use ResponseTrait;

    public function index(){
        return $this->responseData(
            '',
            Response::HTTP_ACCEPTED,
            "",
            ModelVehicule::all()
        );
    }

    public function getVehicules(Request $request){
        $vehicules = Vehicule::where('model_vehicule_id', $request->id)->get();
        return $this->responseData(
            '',
            Response::HTTP_ACCEPTED,
            "",
            $vehicules
        );
    }

}
