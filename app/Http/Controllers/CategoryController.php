<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vehicule;
use App\traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    use ResponseTrait;
    public function index()
    {
        return $this->responseData(
            '',
            Response::HTTP_ACCEPTED,
            "",
            Category::all()
        );
    }

    public function getVehicules(Request $request){
        $vehicules = Vehicule::where('category_id', $request->id)->get();
        return $this->responseData(
            '',
            Response::HTTP_ACCEPTED,
            "",
            $vehicules
        );
    }
}
