<?php

namespace App\Repositories;

use Image;
use App\Image as Gallery;

class GalleryRepository extends Repository
{
    public function __construct(Gallery $image)
    {
        $this->model = $image;
    }
    public function addImage($request){
        $data = $request->except('_token');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            if ($image->isValid()) {
                $img = Image::make($image);
                $data['main_image'] = str_random(8).'.jpg';
                $img->save(public_path().'/'.'/images/gallery/'.$data['main_image']);
            }
        }

        $gallery = $this->model->create($data);
        if ($gallery->exists){
            return ['status' => 'Изображение Добавлено!'];
        }
        return ['status' => 'error'];
    }
}