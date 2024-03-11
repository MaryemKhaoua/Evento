<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller {


    public function index(Request $categories)
{
    $categories = Category::all();
    return view('admin.createCatgr', compact('categories'));
}


    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::where('name', $request->input('category'))->first();

        if ($category) {
            return redirect()->back()->withErrors(['category' => 'Category already exists'])->withInput();
        } else {
            $category = new Category();
            $category->name = $request->category;
            $category->save();

            return redirect()->back()->with('success', 'Category added successfully')->with('category', $category);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            
            $category->delete();
            return redirect('/categories')->with('success', 'Category deleted successfully');
        } else {

            return redirect('/categories')->with('error', 'Category not found');
        }
    }



}
