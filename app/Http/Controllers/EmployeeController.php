<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Repositories\EmployeeRepository;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  App\Repositories\EmployeeRepository $employeeRepository
     * @return view
     */
    public function index(EmployeeRepository $employeeRepository)
    {
        $employees = $employeeRepository->list();
        return view('employee.index', compact('employees'));
    }
    
    /**
     * Show the form for creating a new resource.
     * @param  App\Repositories\CompanyRepository $companyRepository
     * @return view
     */
    public function create(CompanyRepository $companyRepository)
    { 
       $companies = $companyRepository->listOptions();
       return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\EmployeeRequest $employeeRequest
     * @param  App\Repositories\EmployeeRepository $employeeRepository
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $employeeRequest, EmployeeRepository $employeeRepository)
    {
        return !!$employeeRepository->create($employeeRequest->validated()) ? 
        redirect('employees')->with('success','employee has been created') : back()->with('error','error occured while saving employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Employee  $employee
     * @return view
     */
    public function show(Employee $employee)
    {
        $employee->load('company');
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   App\Models\Employee  $employee
     * @param  App\Repositories\CompanyRepository $companyRepository
     * @return  view
     */
    public function edit(Employee $employee, CompanyRepository $companyRepository)
    {
        $companies = $companyRepository->listOptions();
        $employee->load('company');
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   App\Http\Requests\EmployeeRequest $employeeRequest
     * @param   App\Models\Employee  $employee
     * @param   App\Repositories\EmployeeRepository $employeeRepository
     * @return  view
     */
    public function update(EmployeeRequest $employeeRequest, Employee $employee, EmployeeRepository $employeeRepository)
    {
        return !!$employeeRepository->update($employee, $employeeRequest->validated()) ? 
        redirect('employees')->with('success','employee has been updated') : back()->with('error','error occured while updating employee');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   App\Models\Employee  $employee
     * @param   App\Repositories\EmployeeRepository $employeeRepository
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, EmployeeRepository $employeeRepository)
    {
        return $employeeRepository->delete($employee) ? 
        redirect('employees')->with('success','employee has been deleted successfully') : back()->with('error','error occured while destorying employee');
    }
}
