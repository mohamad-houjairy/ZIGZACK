<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Logic to list categories
        return response()->json(Category::all());
    }

    public function show($id)
    {
        // Logic to show a specific category
        $category = Category::findOrFail($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        return response()->json($category);
    }

    public function store(Request $request)
    {
        // Logic to create a new category
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing category
        $category = Category::findOrFail($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        // Logic to delete an existing category
        $category = Category::findOrFail($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
