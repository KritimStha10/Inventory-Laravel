<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at','desc')->get();
        return view('frontend.company.index', compact('companies'));
    }

    public function store(CompanyStoreRequest $request)
    {
        $data = $request->all();
        $company = Company::create($data);
        if ($company) {
            return redirect()->route('user.company.index')
                ->withSuccessMessage('Company is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Company can not be added.');
    }


    public function edit(Company $company)
    {
        
        return view('frontend.company.edit', compact('company'));
    }


    public function update(CompanyUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $company = Company::where('id', $id)->update($data);
        if ($company) {
            return redirect()->route('user.company.index')
                ->withSuccessMessage('Company is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Company can not be updated.');
    }

    public function destroy($id)
    {
        $company = Company::find($id)->delete($id);

        if ($company) {
            return response()->json([
                'type' => 'success',
                'message' => 'Company is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Company can not be deleted.'
        ], 422);
    }
}
