@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> {{ $title }}</h4>

        <div class="card">
            <h5 class="card-header">Available Category Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Sub Category Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($subCategory as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->subcategory_name }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <form action="{{ route('subcategory.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('subcategory.edit', $item->id) }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <button type="submit" class="btn btn-icon btn-outline-danger">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center fw-bold fs-5">
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
