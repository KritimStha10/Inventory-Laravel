<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxStoreRequest;
use App\Http\Requests\TaxUpdateRequest;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $taxs = Tax::orderBy('created_at','desc')->get();
        return view('frontend.tax.index', compact('taxs'));
    }

    public function store(TaxStoreRequest $request)
    {
        $data = $request->all();
        $tax = Tax::create($data);
        if ($tax) {
            return redirect()->route('user.tax.index')
                ->withSuccessMessage('Tax is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Tax can not be added.');
    }

    public function edit(Tax $tax)
    {
        
        return view('frontend.tax.edit', compact('tax'));
    }

    public function update(TaxUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $tax = Tax::where('id', $id)->update($data);
        if ($tax) {
            return redirect()->route('user.tax.index')
                ->withSuccessMessage('Tax is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Tax can not be updated.');
    }

    public function destroy($id)
    {
        $tax = Tax::find($id)->delete($id);

        if ($tax) {
            return response()->json([
                'type' => 'success',
                'message' => 'Tax is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Tax can not be deleted.'
        ], 422);
    }
}
