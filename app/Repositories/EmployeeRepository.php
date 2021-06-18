<?php

namespace App\Repositories;

use App\InterFaces\CrudInterface;
use App\Models\Employee;

class EmployeeRepository implements CrudInterface
{
    public function list(): mixed
    {
        $employees = Employee::with('company')->paginate(10);
        return $employees;
    }

    public function create(array $data): object
    {
        $employee = Employee::create($data);
        return $employee;
    }

    public function update($employee, array $data): object
    {
        $employee = $employee->update($data);
        return $employee;
    }

    public function delete($employee): bool
    {
        return $employee->delete() ? true : false;
    }
}
