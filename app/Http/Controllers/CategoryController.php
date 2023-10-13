<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        // get find update delete
        $categories = Category::paginate(5);
        return view('category.index', ['categories' => $categories]);
    }
    function show($id)
    {
        $category = Category::find($id);
        return view('category.show', ['category' => $category]);
    }
    function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
    }
    function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:20'],
        ]);
        $data = $request->only('name');
        Category::find($id)->update($data);
        return redirect()->route('category.show', $id);
    }
    function create()
    {
        return view('category.create');
    }
    function store(Request $request)
    {
        // layout
        // component
        // adminlte
        // pagination
        // relations
        // migrations
        // resource controller
        // uuid
        // seeders
        // factory
        // static assets
        $request->validate([
            'name' => ['required', 'min:5', 'max:20'],
        ]);
        $category = Category::create($request->only('name'));
        return redirect()->route('category.show', $category->id);
    }
    function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index');
    }
}
