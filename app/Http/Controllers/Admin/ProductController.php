<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Products";
        $product = Product::latest()->get();
        return view('product.index', compact('title', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Products";
        $category = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        return view('product.create', compact('title', 'category', 'subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $categoryId = $request->product_category_id;
        $subCategoryId = $request->product_subcategory_id;

        $categoryName = Category::where('id', $categoryId)->value('category_name');
        $subCategoryName = Subcategory::where('id', $subCategoryId)->value('subcategory_name');

        $image = $request->file('product_image');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'), $imageName);
        $imageUrl = 'upload/' . $imageName;

        Product::create([
            'product_name' => $request->product_name,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_price' => $request->product_price,
            'product_qty' => $request->product_qty,
            'product_category_id' => $categoryId,
            'product_subcategory_id' => $subCategoryId,
            'product_category_name' => $categoryName,
            'product_subcategory_name' => $subCategoryName,
            'product_image' => $imageUrl,
            'slug' => Str::slug($request->product_name)
        ]);

        Category::where('id', $categoryId)->increment('product_count', 1);
        Subcategory::where('id', $subCategoryId)->increment('product_count', 1);

        alert()->success('Product', "Product $request->product_name Created Successfully! ");
        return redirect()->route('product.index');
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
    public function edit(Product $product)
    {
        $title = "Edit Products";

        return view('product.edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
        ]);

        $product->update([
            'product_name' => $request->product_name,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_price' => $request->product_price,
            'product_qty' => $request->product_qty,
        ]);

        alert()->success('Product', "Product $request->product_name Updated Successfully! ");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (File::exists(public_path($product->product_image))) {
            File::delete(public_path($product->product_image));
        }
        Category::where('id', $product->product_category_id)->decrement('product_count', 1);
        Subcategory::where('id', $product->product_subcategory_id)->decrement('product_count', 1);
        $product->delete();
        alert()->success('Product', "Product $product->product_name Deleted Successfully! ");
        return redirect()->route('product.index');
    }

    public function editImage($id)
    {
        $product = Product::findOrFail($id);
        $title = "Edit Product Image";
        return view('product.edit-image', compact('product', 'title'));
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if (File::exists(public_path($product->product_image))) {
            File::delete(public_path($product->product_image));
        }

        $image = $request->file('product_image');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'), $imageName);
        $imageUrl = 'upload/' . $imageName;

        $product->update([
            'product_image' => $imageUrl,
        ]);


        alert()->success('Product Image', "Product Image Updated Successfully! ");
        return redirect()->route('product.index');
    }
}
