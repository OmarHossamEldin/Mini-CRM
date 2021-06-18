<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  App\Repositories\CompanyRepository $companyRepository
     * @return view
     */
    public function index(CompanyRepository $companyRepository)
    {
        $companies = $companyRepository->list();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create()
    {
       return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\CompanyRequest $companyRequest
     * @param  App\Repositories\CompanyRepository $companyRepository
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $companyRequest, CompanyRepository $companyRepository)
    {
        return !!$companyRepository->create($companyRequest->validated()) ? 
        redirect('companies')->with('success','company has been created') : back()->with('error','error occured while saving company');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Company  $company
     * @return view
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   App\Models\Company  $company
     * @return  view
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   App\Http\Requests\CompanyRequest $companyRequest
     * @param   App\Models\Company  $company
     * @param   App\Repositories\CompanyRepository $companyRepository
     * @return  view
     */
    public function update(CompanyRequest $companyRequest, Company $company, CompanyRepository $companyRepository)
    {
        return !!$companyRepository->update($company, $companyRequest->validated()) ? 
        redirect('companies')->with('success','company has been updated') : back()->with('error','error occured while updating company');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   App\Models\Company  $company
     * @param   App\Repositories\CompanyRepository $companyRepository
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Company $company, CompanyRepository $companyRepository)
    {
        return $companyRepository->delete($company) ? 
        redirect('companies')->with('success','company has been deleted successfully') : back()->with('error','error occured while destorying company');
    }
}
