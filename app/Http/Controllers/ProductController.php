<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\{
    Product,
    Category
};

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $products = Product::where('name', 'LIKE', "%{$search}%")
                            ->orWhere('slug', 'LIKE', "%{$search}%")
                            ->orWhere('small_description', 'LIKE', "%{$search}%")
                            ->orWhere('description', 'LIKE', "%{$search}%")
                            ->orWhere('price', 'LIKE', "%{$search}%")
                            ->paginate();
        $products->appends(['search' => $search]);

        return view('product.index', compact('products'));
    }

    public function create(Category $category, Product $product)
    {
        $categories = $category->orderBy('name')->get();

        return view('product.create', compact('product', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        return Product::store($request);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Category $category, Product $product)
    {
        $categories = $category->orderBy('name')->get();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        return Product::up($request, $product);
    }

    public function destroy(Product $product)
    {
        return $product->remove();
    }
}
