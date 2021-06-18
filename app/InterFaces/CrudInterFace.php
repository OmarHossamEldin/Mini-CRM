<?php

namespace App\InterFaces;

interface CrudInterface {
    
    public function list(): mixed;

    public function create(array $data): mixed;

    public function update($model, array $data): mixed;

    public function delete($model):bool;
}