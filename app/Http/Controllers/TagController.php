<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\traits\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TagController extends Controller
{

    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return $this->responseData(
            "",
            ResponseAlias::HTTP_ACCEPTED,
            "",
            $tags
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
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
