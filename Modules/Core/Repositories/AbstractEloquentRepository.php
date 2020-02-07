<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Interfaces\EloquentRepositoryInterface;

abstract class AbstractEloquentRepository implements EloquentRepositoryInterface
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function model()
    {
        return $this->model;
    }
    
    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create($array)
    {
        $newModel = $this->model->create($array);
        return $newModel;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update($array)
    {
        $updateModel = $this->model->find($array['id']);
        if (empty($updateModel)) {
            return null;
        }
        $updateModel->fill($array);
        $updateModel->save();
        return $updateModel;
    }

    public function delete($id)
    {
        $deleteModel = $this->model->find($id);
        $deleteModel->delete();
        return $deleteModel;
    }

    public function findByField($field, $data, $single = false)
    {
        if ($single) {
            return $this->model->where($field, $data)->first();
        } else {
            return $this->model->where($field, $data)->get();
        }
    }

    public function findLike($field, $data)
    {
        return $this->model->where($field, "like", "%" . $data . "$")->get();
    }

    public function first($field = "id", $orderBy = "desc")
    {
        return $this->model->orderBy($field, $orderBy)->first();
    }
    
    public function generateRandomString($length = 10)
    {    
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
