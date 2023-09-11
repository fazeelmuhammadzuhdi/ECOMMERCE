@extends('profile.user-profile')

@section('profile-content')
    <h1>Pending Orders</h1>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $totalPrice = 0;
                @endphp
                @forelse ($orders as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>$ {{ $item->product_price }}</td>
                    </tr>
                    @php
                        $totalPrice += $item->total_price;
                    @endphp

                @empty
                    <tr class="text-center fw-bold fs-5">
                        <td colspan="5">No Data</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="3" class="text-center">Total Price</td>
                    <td>$ {{ $totalPrice }}</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
