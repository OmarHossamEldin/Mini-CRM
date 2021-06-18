<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(CompanyRequest $request, CompanyRepository $companyRepository)
    {
        return !!$companyRepository->create($request->validated()) ? 
        redirect('companies')->with('success','company has been created') : back()->with('error','error occured while saving company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
