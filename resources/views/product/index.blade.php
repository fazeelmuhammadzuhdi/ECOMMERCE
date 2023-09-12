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
                                    <div class="d-flex">
                                        <button class="btn btn-icon btn-outline-danger me-2"
                                            onclick="deleteAlert('{{ $item->id }}', 'Delete Product {{ $item->product_name }}')">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>

                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                            id="Delete{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('product.edit', $item->id) }}"
                                                class="btn btn-icon btn-outline-primary">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center fw-bold fs-5">
                                <td colspan="5">No Data Product</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('alert.delete')
@endsection
