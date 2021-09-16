<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
 

class CategoryController extends Controller
{

    private $categoryService;
     

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->categoryService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        return $this->categoryService->store($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->categoryService->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        return $this->categoryService->update($validated, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

    public function changeActive (Request $request)
    {       
        return $this->categoryService->changeActive($request);
    }

    public function move (Request $request)
    {       
        return $this->categoryService->move($request);
    }

    public function getCategoryAll()
    {
         
        return $this->categoryService->categoryAll();
    }
}
