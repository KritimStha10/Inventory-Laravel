<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $companies = Company::where('status','1')->get();
        $suppliers = Supplier::where('status','1')->get();
        return view('frontend.product.index', compact('products','categories','companies','suppliers'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();
        $product = Product::create($data);
        if ($product) {
            return redirect()->route('user.product.index')
                ->withSuccessMessage('Product is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Product can not be added.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status','1')->get();
        $companies = Company::where('status','1')->get();
        $suppliers = Supplier::where('status','1')->get();
        return view('frontend.product.edit', compact('product','categories','companies','suppliers'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $product = Product::where('id', $id)->update($data);
        if ($product) {
            return redirect()->route('user.product.index')
                ->withSuccessMessage('Product is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Product can not be updated.');
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete($id);

        if ($product) {
            return response()->json([
                'type' => 'success',
                'message' => 'Product is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Product can not be deleted.'
        ], 422);
    }
}
