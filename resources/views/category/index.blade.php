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
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Category Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($category as $item)
                            <tr>
                                <td>{{ $loop->iteration + $category->firstItem() - 1 . '.' }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->subcategory_count }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-icon btn-outline-danger me-2"
                                            onclick="deleteAlert('{{ $item->id }}', 'Delete Category {{ $item->category_name }}')">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>

                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                            id="Delete{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-icon btn-outline-primary">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>
                                        </form>
                                    </div>
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
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        {{ $category->links() }}
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    @include('alert.delete')
@endsection
