<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Sub Category";
        $subCategory = Subcategory::latest()->get();
        return view('subcategory.index', compact('title', 'subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Sub Category";
        $category = Category::latest()->get();
        return view('subcategory.create', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Sub Category
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);

        // Menngambil Category Id Dari Request Inputan
        $categoryId = $request->category_id;
        // dd($categoryId);

        // Mengambil Nilai Category Name Yang Ada Di Tabel Category, Dimana Id Nya Harus Sama Dengan Request CategoryId
        $categoryName = Category::where('id', $categoryId)->value('category_name');

        // Menyimpan Data Ke Dalam Tabel Subcategory
        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $categoryId,
            'category_name' => $categoryName,
            'slug' => Str::slug($request->subcategory_name)
        ]);

        // Mengupdate Sub Category Count Yang Ada Pada Table Category, Ketika Id Nya Sama Dengan Request
        Category::where('id', $categoryId)->increment('subcategory_count', 1);

        // Alert Menggunakan Real Rashid
        alert()->success('Sub Category', "Sub Category $request->subcategory_name Created Successfully! ");
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
