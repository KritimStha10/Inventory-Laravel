<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->get();
        return view('frontend.category.index', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();
        $category = Category::create($data);
        if ($category) {
            return redirect()->route('user.category.index')
                ->withSuccessMessage('Category is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Category can not be added.');
    }

    public function edit(Category $category)
    {
        
        return view('frontend.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $category = Category::where('id', $id)->update($data);
        if ($category) {
            return redirect()->route('user.category.index')
                ->withSuccessMessage('category is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('category can not be updated.');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete($id);

        if ($category) {
            return response()->json([
                'type' => 'success',
                'message' => 'Category is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Category can not be deleted.'
        ], 422);
    }
}
