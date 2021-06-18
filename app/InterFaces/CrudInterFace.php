<?php

namespace App\InterFaces;

interface CrudInterface {
    
    public function list(): array;

    public function create(object $data): object;

    public function update($model, object $data): object;

    public function delete($model):bool;
}