@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> {{ $title }}</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add New Product</h5>
                        <small class="text-muted float-end">Input Information Product</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_name"
                                        class="form-control @error('product_name') is-invalid @enderror"
                                        id="basic-default-name" placeholder="Electronics"
                                        value="{{ old('product_name') }}" />
                                    @error('product_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="product_price"
                                        class="form-control @error('product_price') is-invalid @enderror"
                                        id="basic-default-name" placeholder="0" value="{{ old('product_price') }}" />
                                    @error('product_price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_qty"
                                        class="form-control @error('product_qty') is-invalid @enderror"
                                        id="basic-default-name" placeholder="0" value="{{ old('product_qty') }}" />
                                    @error('product_qty')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea name="product_short_description" class="form-control @error('product_short_description') is-invalid @enderror"
                                        id="product_short_description" cols="30" rows="2"> {{ old('product_short_description') }}
                                    </textarea>
                                    @error('product_short_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea name="product_long_description" class="form-control @error('product_long_description') is-invalid @enderror"
                                        id="product_long_description" cols="30" rows="2"> {{ old('product_long_description') }}
                                    </textarea>
                                    @error('product_long_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="product_category_id"
                                        class="form-select @error('product_category_id') is-invalid @enderror">
                                        <option value="" selected disabled>Choose Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="product_subcategory_id"
                                        class="form-select @error('product_subcategory_id') is-invalid @enderror"">
                                        <option value="" selected disabled>Choose Sub Category</option>
                                        @foreach ($subcategory as $item)
                                            <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_subcategory_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="product_image" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
