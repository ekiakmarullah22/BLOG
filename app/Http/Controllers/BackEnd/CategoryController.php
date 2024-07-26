<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.category.index', [
            'categories' => Category::latest()->paginate(5)
        ]);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|min:3|unique:categories,title'
        ]);

        $data['slug'] = Str::slug($data['title']);

        Category::create($data);

        return back()->with('success', 'Category Has Been Created...');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'title' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['title']);

        Category::find($id)->update($data);

        return back()->with('success', 'Category Has Been Updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::find($id)->delete();

        return back()->with('success', 'Category Has Been Deleted...');
    }
}
