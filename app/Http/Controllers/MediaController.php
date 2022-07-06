<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MediaRequest;
use App\Models\{
    Product,
    Media
};

class MediaController extends Controller
{
    public function index(Request $request, Product $product)
    {
        $search = $request->search ?? '';
        $media = $product->media()
                         ->where('file', 'LIKE', "%{$search}%")
                         ->orWhere('extension', 'LIKE', "%{$search}%")
                         ->orderBy('order')
                         ->paginate();

        if (!empty($search))
            $media->appends(['search' => $search]);

        return view('product.media.index', compact('product', 'media'));
    }

    public function create(Product $product)
    {
        $order = Media::listOrderStatus($product);

        return view('product.media.create', compact('product', 'order'));
    }

    public function store(MediaRequest $request, Product $product)
    {
        $media = new Media;

        return $media::store($request, $product);
    }

    public function show(Media $media)
    {
        //
    }

    public function edit(Product $product, Media $media)
    {
        $order = Media::listOrderStatus($product);

        return view('product.media.edit', compact('product', 'media', 'order'));
    }

    public function update(MediaRequest $request, Product $product, Media $media)
    {
        return $media->up($request, $product);
    }

    public function destroy(Product $product, Media $media)
    {
        return $media->remove($product);
    }
}
