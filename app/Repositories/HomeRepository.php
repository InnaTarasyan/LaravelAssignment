<?php

namespace App\Repositories;

use App\MainInfo;

class HomeRepository extends Repository
{
    public function __construct(MainInfo $info)
    {
        $this->model = $info;
    }
    public function editText($request, $info){
        $data = $request->except('_token',  '_method');
        if(empty($data)){
            return array(['error' => 'Нет Данных!']);
        }

        $info->fill($data);
        if($info->update()){
            return ['status' => 'Текст Обновлен!'];
        }

    }

    public function addText($request){
        $data = $request->except('_token',  '_method');
        $this->model->fill($data);
        $news = $this->model->create($data);
        if ($news->exists){
            return ['status' => 'Текст Добавлен!'];
        }
        return ['status' => 'error'];
    }
}