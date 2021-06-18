<?php

namespace App\Repositories;

use App\InterFaces\CrudInterface;
use App\Models\Company;

class CompanyRepository implements CrudInterface
{

    public function list(): array
    {
        $companies = Company::paginate(10);
        return $companies;
    }

    public function create(object $data): object
    {
        $company = Company::create($data);
        return $company;
    }

    public function update($model, object $data): object
    {
        $company = $model->update($data);
        return $company;
    }

    public function delete($model): bool
    {
        return $model->delete() ? true : false;
    }
}
