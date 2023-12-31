@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> {{ $title }}</h4>

        <div class="card">
            <h5 class="card-header">List Of Orders User ID {{ $shippingInformation->user_id }} & Phone Number
                {{ $shippingInformation->phone_number }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Jumlah Beli</th>
                            <th>Product Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $totalPrice = 0;
                        @endphp
                        @forelse ($orders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ asset($item->product_image) }}" target="_blank">
                                        <img src="{{ asset($item->product_image) }}" alt="No Image" width="100">
                                    </a>
                                </td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>
                                    <form action="{{ route('order.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success">Accept Now</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $totalPrice += $item->total_price;
                            @endphp
                        @empty
                            <tr class="text-center fw-bold fs-5">
                                <td colspan="6">No Data</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="4" class="text-center fw-bold">Total Price</td>
                            <td>$ {{ $totalPrice }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
