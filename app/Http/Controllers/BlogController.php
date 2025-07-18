<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\traits\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{

    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $max = $request->get('max', 2);
        $sort = $request->get('sort', 'desc');
        $order = $request->get('order', 'id');

        $blogs = Blog::when($request->has('marque_id'), function ($query) use ($request) {
            return $query->where('marque_id', $request->marque_id);
        })
            ->when($request->has('tags'), function ($query) use ($request) {
                return $query->whereHas('tags', function ($query) use ($request) {
                    $query->whereIn('tags.id', explode(',',$request->tags));
                }, '=', count(explode(',',$request->tags)));
            })
            ->orderBy($order, $sort)
            ->paginate($max);

        return BlogCollection::make($blogs);
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
    public function show(Request $request)
    {
        $blog = Blog::find($request->id);
        if (!$blog) {
            return $this->responseData(
                "Blog not found",
                Response::HTTP_NOT_FOUND,
                "",
                null
            );
        }
        return $this->responseData(
            "Blog found",
            Response::HTTP_OK,
            "",
            BlogResource::make($blog)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function addAvis(Request $request){
        $blog = Blog::find($request->blog_id);
        if (!$blog) {
            return $this->responseData(
                "Blog not found",
                Response::HTTP_NOT_FOUND,
                "",
                null
            );
        }

        $blog->avis()->create([
            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "email" => $request->email,
            "pays" => $request->pays,
            "rate" => $request->rate,
            "content" => $request['content'],
        ]);

        return $this->responseData(
            "Avis added successfully",
            Response::HTTP_CREATED,
            "",
            $blog->avis
        );
    }


    public function getAvisByBlog(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        if (!$blog) {
            return $this->responseData(
                "Blog not found",
                Response::HTTP_NOT_FOUND,
                "",
                null
            );
        }
        return $this->responseData(
            "Avis added successfully",
            Response::HTTP_CREATED,
            "",
            $blog->avis
        );
    }


}
