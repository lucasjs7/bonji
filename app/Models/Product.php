<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'small_description',
        'description',
        'price',
        'discount',
        'weight',
        'height',
        'width',
        'length',
        'page_title',
        'slug',
        'meta_description'
    ];

    public function scopeCountSlug($query, $slug, $id = '')
    {
        $query->where('slug', '=', $slug);
        
        if (!empty($id))
            $query->where('id', '!=', $id);

        return $query;
    }

    public static function store($request)
    {
        $product = new Product();

        $product->fill([
            'name'              => $request->name,
            'code'              => $request->code,
            'small_description' => $request->small_description,
            'description'       => $request->description,
            'price'             => $request->price,
            'discount'          => $request->discount,
            'weight'            => $request->weight,
            'height'            => $request->height,
            'width'             => $request->width,
            'length'            => $request->length,
            'page_title'        => $request->page_title,
            'slug'              => $request->slug,
            'meta_description'  => $request->meta_description
        ]);

        if (!$product->save())
            return back()->withInput()->withError('Erro inesperado.');

        $category = [];

        if (isset($request->categories)) {

            for ($i=0; $i < count($request->categories); $i++) {
                $category[] = $request->categories[$i];
            }

        }

        $product->categories()->attach($category);

        return redirect()->route('admin.products.index');
    }

    public static function up($request, $product)
    {
        $product->fill([
            'name'              => $request->name,
            'code'              => $request->code,
            'small_description' => $request->small_description,
            'description'       => $request->description,
            'price'             => $request->price,
            'discount'          => $request->discount,
            'weight'            => $request->weight,
            'height'            => $request->height,
            'width'             => $request->width,
            'length'            => $request->length,
            'page_title'        => $request->page_title,
            'slug'              => $request->slug,
            'meta_description'  => $request->meta_description
        ]);

        if (!$product->update())
            return back()->withInput()->withError('Erro inesperado.');

        $category = [];
        
        if (isset($request->categories)) {
                
            for ($i=0; $i < count($request->categories); $i++) {
                $category[] = $request->categories[$i];
            }
        
        }

        $product->categories()->sync($category);

        return redirect()->route('admin.products.index');
    }

    public function remove()
    {
        $media = $this->media()->get();

        foreach($media as $md) {
        
            if (!$md->remove($this))
                return back()->withError('Erro inesperado');

        }

        $this->categories()->sync([]);

        if (!$this->delete())
            return back()->withError('Erro inesperado.');

        return redirect()->route('admin.products.index');
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function checkCategory($category_id, $categories = null)
    {
        return $categories == null
                ? $this->categories()->where('category_id', $category_id)->exists()
                : in_array($category_id, $categories);
    }
}
