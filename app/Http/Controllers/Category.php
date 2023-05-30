<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;
class Category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryModel::get();
        return view('category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = [
            'name' => $r->name
        ];

        CategoryModel::create($data);

        return redirect('admin/category')->with([
            'status' => 'success',
            'message' => $r->name.' has been added'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CategoryModel::find($id);

        return view('category.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $category = CategoryModel::find($id);
        $category->name = $r->name;
        $category->save();

        return redirect('admin/category')->with([
            'status' => 'success',
            'message' => $category->name.' has ben updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exp = CategoryModel::find($id);
        $exp->delete();

        return redirect('admin/category')->with([
            'status' => 'success',
            'message' => $exp->name.' has ben deleted'
        ]);
    }
}
