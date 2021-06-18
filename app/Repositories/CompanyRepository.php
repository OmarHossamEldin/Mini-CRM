<?php

namespace App\Repositories;

use App\InterFaces\CrudInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use Throwable;

class CompanyRepository implements CrudInterface
{
    const ROOTPATH = 'images/';
    public function list(): mixed
    {
        $companies = Company::paginate(10);
        return $companies;
    }

    public function create(array $data): mixed
    {
        try {
            DB::beginTransaction();
            if(request()->logo->isValid()) {
                $logoPath = now()->format('d-m-y-h-s-m') . request()->logo->getClientOriginalName();
                $logoPath = request()->logo->storeAs(self::ROOTPATH . Company::count() + 1,  $logoPath);
                $data['logo'] = $logoPath;
                $company = Company::create($data);
            }   
            DB::commit();
            return $company;
        } 
        catch (Throwable $e)
        {
            report($e);
            DB::rollback();
            return false;
        }
    }

    public function update($company, object $data): mixed
    {
        try {
            DB::beginTransaction();
            if(request()->logo->isValid()) {
                $logoPath = now()->format('d-m-y-h-s-m') . request()->logo->getClientOriginalName();
                $logoPath = request()->logo->storeAs(self::ROOTPATH . $company->id,  $logoPath);
                $data['logo'] = $logoPath;
                $company = $company->update($data);
            }   
            DB::commit();
            return $company;
        } 
        catch (Throwable $e)
        {
            report($e);
            DB::rollback();
            return false;
        }
        
    }

    public function delete($company): bool
    {
        return $company->delete() ? true : false;
    }
}
