<?php

namespace App\Repositories;

use App\InterFaces\CrudInterface;
use App\Models\Employee;

class EmployeeRepository implements CrudInterface
{
    public function list(): mixed
    {
        $employees = Employee::paginate(10);
        return $employees;
    }

    public function create(array $data): object
    {
        $employee = Employee::create($data);
        return $employee;
    }

    public function update($model, object $data): object
    {
        $employee = $model->update($data);
        return $employee;
    }

    public function delete($model): bool
    {
        return $model->delete() ? true : false;
    }
}
