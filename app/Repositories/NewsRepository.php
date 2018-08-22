<?php

namespace App\Repositories;
use App\News;
use Image;
use Carbon\Carbon;

class NewsRepository extends Repository
{
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function addNews($request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            if ($image->isValid()) {
                $img = Image::make($image);
                $data['main_image'] = str_random(8).'.jpg';
                $img->save(public_path().'/'.'/images/news/'.$data['main_image']);
            }
        }

        $this->model->fill($data);
        $news = News::create($data);
        if ($news->exists){
            return ['status' => 'Приложение Добавлено!'];
        }
        return ['status' => 'error'];

    }

    public function updateNews($request, $news){
        $data = $request->except('_token', 'img', 'old_image', '_method');
        if(empty($data)){
            return array(['error' => 'Нет Данных!']);
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            if ($image->isValid()) {
                $img = Image::make($image);
                $data['main_image'] = str_random(8).'.jpg';
                $img->save(public_path().'/'.'/images/news/'.$data['main_image']);

                // we can move image without Image library

            }
        }

        $news->fill($data);
        if($news->update()){
            return ['status' => 'Новость обновлена!'];
        }


    }

    public function deleteNews($news){
        if($news->delete()){
            return ['status' => 'Новость удалена!'];
        }

    }
}