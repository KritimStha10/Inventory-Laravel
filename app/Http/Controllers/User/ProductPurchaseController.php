<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\PurchaseStoreRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::where('status','1')->get();
        $products = Product::where('status','1')->get();
        $suppliers = Supplier::where('status','1')->get();
        return view('frontend.purchase.index', compact('purchases','products','suppliers'));
    }

    public function store(PurchaseStoreRequest $request)
    {
        $data = $request->all();
        $purchase = Purchase::create($data);
        if ($purchase) {
            return redirect()->route('user.purchase.index')
                ->withSuccessMessage('Purchase is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Purchase can not be added.');
    }

    public function edit(Purchase $purchase)
    {
        $products = Product::where('status','1')->get();
        $suppliers = Supplier::where('status','1')->get();
        return view('frontend.purchase.edit', compact('purchase','products','suppliers'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $purchase = Purchase::where('id', $id)->update($data);
        if ($purchase) {
            return redirect()->route('user.purchase.index')
                ->withSuccessMessage('Purchase is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Purchase can not be updated.');
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id)->delete($id);

        if ($purchase) {
            return response()->json([
                'type' => 'success',
                'message' => 'Purchase is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Purchase can not be deleted.'
        ], 422);
    }

}
