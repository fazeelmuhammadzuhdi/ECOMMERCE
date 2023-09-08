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
                        <h5 class="mb-0">Add New Category</h5>
                        <small class="text-muted float-end">Input Information Category</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category_name"
                                        class="form-control @error('category_name') is-invalid @enderror"
                                        id="basic-default-name" placeholder="Electronics"
                                        value="{{ old('category_name') }}" />
                                    @error('category_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category_name"
                                        class="form-control @if ($errors->has('category_name')) is-invalid @elseif(old('category_name')) is-valid @endif"
                                        id="basic-default-name" placeholder="Electronics" />
                                    @if ($errors->has('category_name'))
                                        <div class="invalid-feedback">{{ $errors->first('category_name') }}</div>
                                    @else
                                        <div class="valid-feedback">
                                            Cool Name!
                                        </div>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
