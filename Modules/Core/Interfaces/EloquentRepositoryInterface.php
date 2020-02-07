<?php

namespace Modules\Core\Interfaces;

interface EloquentRepositoryInterface
{

    public function findById($id);

    public function model();

    public function create($array);

    public function all();

    public function update($array);

    public function delete($id);

    public function findByField($field, $data, $single = false);

    public function findLike($field, $data);

    public function first($field = "id", $orderBy = "desc");
    
}
