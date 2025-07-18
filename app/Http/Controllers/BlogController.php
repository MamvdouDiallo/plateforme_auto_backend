<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogCollection;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
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
    public function show(Blog $blog)
    {
        //
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
}
