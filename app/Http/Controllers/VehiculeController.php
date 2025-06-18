<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehiculeListCollection;
use App\Http\Resources\VehiculeListResource;
use App\Http\Resources\VehiculeResource;
use App\Models\Vehicule;
use App\traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehiculeController extends Controller
{

    use ResponseTrait;
    public function index(Request $request){
        $max = $request->get('max', 4);
        $sort = $request->get('sort', 'desc');
        $order = $request->get('order', 'id');

        $vehicules = Vehicule::when($request->has('marque_id'), function ($query) use ($request) {
            return $query->where('marque_id', $request->marque_id);
        })
            ->when($request->has('model_vehicule_id'), function ($query) use ($request) {
                return $query->where('model_vehicule_id', $request->model_vehicule_id);
            })
            ->when($request->has('category_id'), function ($query) use ($request) {
                return $query->where('category_id', $request->category_id);
            })
            ->orderBy($order, $sort)
            ->paginate($max);


        return VehiculeListCollection::make($vehicules);
    }

    public function show(Vehicule $vehicule){
        return VehiculeResource::make($vehicule);
    }
}

