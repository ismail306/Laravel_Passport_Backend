<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return response()->json(['data' => BlogResource::collection($blogs)], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }


        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return response()->json(['message' => 'Blog created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            return response()->json(['data' => new BlogResource($blog)], 200);
        } else {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        if ($blog) {
            return response()->json(['data' => new BlogResource($blog)], 200);
        } else {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return response()->json(['message' => 'Blog updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            return response()->json(['message' => 'Blog deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    }
}
