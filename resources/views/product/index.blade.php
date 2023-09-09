@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> {{ $title }}</h4>

        <div class="card">
            <h5 class="card-header">Available Product Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>{{ $item->product_qty }}</td>
                                <td>
                                    <a href="{{ asset($item->product_image) }}" target="_blank">
                                        <img src="{{ asset($item->product_image) }}" alt="No Image" width="100">
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('product.edit', $item->id) }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <a href="{{ route('edit-image', $item->id) }}"
                                            class="btn btn-icon btn-outline-warning">
                                            <i class="bx bx-image-alt"></i>
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
