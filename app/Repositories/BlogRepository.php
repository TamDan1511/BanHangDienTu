<?php

namespace App\Repositories;
use App\Models\Blog;

class BlogRepository
{
    public function index()
    {
        $blogAll = Blog::paginate(6);
        return response()->json([
            'count' => Blog::count(),
            'active'=> Blog::where('status', 1)->count(),
            'blogs' => $blogAll
        ]);
    }

    public function store($validated)
    {
        return Blog::create($validated); // return this model
    }

    public function find($id)
    {
        return Blog::find($id);
    }

    public function changeActive($id, $value)
    {
        $value = $value == 1 ? 0 : 1;
        return Blog::where('id', $id)->update(['status' => $value]);
    }

    public function blogAll()
    {
        $blogsAll = Blog::orderBy('left')->get();
        return response()->json(
            [
                'blogsAll' => $blogsAll
            ]
        );
    }

    public function update($validated, $id)
    {
        return Blog::where('id', $id)->update($validated);
    }
}
