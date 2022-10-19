<?php

namespace App\Http\Controllers\Api\Managers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Category\CreateCategoryRequest;
use App\Http\Requests\Manager\Category\UpdateCategoryRequest;
use App\Models\Api\Manager\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with('book')->get();
        return $category;
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = [
            'category_name' => $request['category_name'],
            'level' => $request['level'],
            'parent' => $request['parent'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Category::create($category);
        return response()->json([
            'status_code' => 200,
            'message' => 'OK',
            'category' => $category
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return response()->json([
            'status_code' => 200,
            'message' => 'OK',
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $update = [
            'category_name' => $request['category_name'],
            'level' => $request['level'],
            'parent' => $request['parent'],
            'updated_at' => now(),
        ];
        $category->update($update);
        return response()->json([
            'status_code' => 200,
            'message' => 'OK',
            'category' => $update
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status_code' => 200,
            'message' => 'OK',
        ]);
    }
}
