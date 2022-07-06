<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public static function store($request)
    {
        $data = [
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description
        ];

        if (!Category::create($data))
            return back()->withInput()->withError('Erro inesperado');

        return redirect()->route('admin.categories.index');
    }

    public function up($request)
    {
        $this->fill([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description
        ]);

        if (!$this->update())
            return back()->withInput()->withError('Erro inesperado.');

        return redirect()->route('admin.categories.index');
    }

    public function remove()
    {
        $this->products()->sync([]);

        return $this->delete()
                    ? redirect()->route('admin.categories.index')
                    : back()->withError('Erro inesperado.');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
