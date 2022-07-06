<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Gumlet\ImageResize;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'thumbnail',
        'extension',
        'size',
        'product_id',
        'order'
    ];

    public static function listOrderStatus($product)
    {
        $media = $product->media()->select('order')->get();
        $used = [];
        $order = [];

        foreach($media as $m) {
            $used[] = $m->order;
        }

        $max = count($used) > 0 ? max($used) + 1 : 1;

        for ($i=1; $i <= $max; $i++) {
            $order[] = [
                'number' => $i,
                'status' => in_array($i, $used)
            ];
        }

        return $order;
    }
    
    public static function newFileName($name)
    {
        $slug = Str::of($name)->slug('-');
        $random = Str::random();

        return "{$slug}_{$random}";
    }

    public static function upImage($image, $name, $dimension = [1080, 1080])
    {
        $folder = 'media';
        $path = "{$folder}/{$name}";

        if (gettype($dimension) == 'boolean' && !$dimension) {

            $save = Storage::putFileAs("public/{$folder}", $image, $name);

        } elseif (isset($dimension) && count($dimension) == 2) {

            $resize = new ImageResize($image);
            $resize->resizeToBestFit($dimension[0], $dimension[1]);
    
            $save = Storage::disk('public')->put(
                            $path, 
                            $resize->getImageAsString()
                        );

        } else {
            $save = false;
        }

        return [
            'success'   => $save,
            'path'      => $path,
            'size'      => Storage::disk('public')->size($path)
        ];
    }

    public static function store($request, $product)
    {
        $extension = $request->file('file')->getClientOriginalExtension();
        $new_name = self::newFileName($product->name) . '.' . $extension;
        $img = self::upImage($request->file('file'), $new_name);

        if (!$img['success'])
            return back()->withInput()->withError('Erro inesperado');

        $t_name = "thumbnail_{$new_name}";
        $thumb = self::upImage($request->file('file'), $t_name, [384, 384]);

        if (!$thumb['success'])
            return back()->withInput()->withError('Erro inesperado.');

        $md_order = $product->media()->where('order', '=', $request->order);

        if ($md_order->count() > 0) {

            $new_order = $product->media()->max('order') + 1;

            if (!$md_order->update(['order' => $new_order]))
                return back()->withInput()->withError('Erro inesperado.');

        }

        $media = new Media;
        $media->fill([
            'file'       => $img['path'],
            'thumbnail'  => $thumb['path'],
            'extension'  => $extension,
            'size'       => $img['size'],
            'product_id' => $product->id,
            'order'      => $request->order
        ]);

        if (!$media->save())
            return back()->withInput()->withError('Erro inesperado.');

        return redirect()->route('admin.products.media.index', $product->id);
    }

    public function up($request, $product)
    {
        if (!empty($request->file('file'))) {

            $extension = $request->file('file')->getClientOriginalExtension();
            $new_name = self::newFileName($product->name) . '.' . $extension;
            $img = self::upImage($request->file('file'), $new_name);

            if (!$img['success'])
                return back()->withInput()->withError('Erro inesperado');

            $t_name = "thumbnail_{$new_name}";
            $thumb = self::upImage($request->file('file'), $t_name, [384, 384]);

            if (!$thumb['success'])
                return back()->withInput()->withError('Erro inesperado.');

            Storage::disk('public')->delete($this->file);
            Storage::disk('public')->delete($this->thumbnail);

            $this->fill([
                'file'       => $img['path'],
                'thumbnail'  => $thumb['path'],
                'extension'  => $extension,
                'size'       => $img['size']
            ]);

        }

        if ($request->order != $this->order && !empty($request->order)) {

            $md_order = $product->media()->where('order', '=', $request->order)
                                         ->where('id', '!=', $this->id);

            if ($md_order->count() > 0) {

                if (!$md_order->update(['order' => $this->order]))
                    return back()->withInput()->withError('Erro inesperado.');

            }

            $this->order = $request->order;

        }

        if (!$this->update())
            return back()->withInput()->withError('Erro inesperado.');

        return redirect()->route('admin.products.media.index', $product->id);
    }

    public function remove($product)
    {
        $file = $this->file;
        $thumb = $this->thumbnail;
        $delete = $this->delete();

        if ($delete) {

            Storage::disk('public')->delete($file);
            Storage::disk('public')->delete($thumb);
        
        }
    
        return $delete
                ? redirect()->route('admin.products.media.index', $product->id)
                : back()->withInput()->withError('Erro inesperado.');
    }
}
