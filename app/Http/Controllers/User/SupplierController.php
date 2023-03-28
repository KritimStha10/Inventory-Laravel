<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('created_at','desc')->get();
        return view('frontend.supplier.index', compact('suppliers'));
    }

    public function store(SupplierStoreRequest $request)
    {
        $data = $request->all();
        $supplier = Supplier::create($data);
        if ($supplier) {
            return redirect()->route('user.supplier.index')
                ->withSuccessMessage('Supplier is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Supplier can not be added.');
    }

    public function edit(Supplier $supplier)
    {
        
        return view('frontend.supplier.edit', compact('supplier'));
    }

    public function update(SupplierUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $supplier = Supplier::where('id', $id)->update($data);
        if ($supplier) {
            return redirect()->route('user.supplier.index')
                ->withSuccessMessage('Supplier is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Supplier can not be updated.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id)->delete($id);

        if ($supplier) {
            return response()->json([
                'type' => 'success',
                'message' => 'Supplier is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Supplier can not be deleted.'
        ], 422);
    }
}
