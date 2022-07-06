<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $categories = Category::where('name', 'LIKE', "%{$search}%")
                              ->orWhere('description', 'LIKE', "%{$search}%")
                              ->paginate();

        return view('product.category.index', compact('categories'));
    }

    public function create()
    {
        return view('product.category.create');
    }

    public function store(CategoryRequest $request)
    {
        return Category::store($request);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('product.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        return $category->up($request);
    }

    public function destroy(Category $category)
    {
        return $category->remove();
    }
}
