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
                        <h5 class="mb-0">Edit New Sub Category</h5>
                        <small class="text-muted float-end">Input Information Sub Category</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="subcategory_name"
                                        class="form-control @error('subcategory_name') is-invalid @enderror"
                                        id="basic-default-name" placeholder="Iphone"
                                        value="{{ old('subcategory_name', $subcategory->subcategory_name) }}" autofocus />

                                    @error('subcategory_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Sub Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
