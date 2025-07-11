<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\traits\ResponseTrait;
use App\Models\User; 

class UserController extends Controller
{
    use ResponseTrait;

    public function index(Request $request)
    {    
        return 
            $this->responseData(
            '',
            \Illuminate\Http\Response::HTTP_ACCEPTED,
            "",
            User::all()
        );
    }
}
