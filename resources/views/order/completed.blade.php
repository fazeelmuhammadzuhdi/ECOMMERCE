@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> {{ $title }}</h4>

        <div class="card">
            <h5 class="card-header">List Of Orders Completed</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Shipping Information</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Status </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($orders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <li>Phone Number - {{ $item->phone_number }}</li>
                                    <li>City Name - {{ $item->city_name }}</li>
                                    <li>Postal Code - {{ $item->postal_code }}</li>
                                </td>
                                <td>{{ $item->product_name }} - ({{ $item->product_category_name }})</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>
                                    @if ($item->status == 'Success')
                                        <span class="badge rounded-pill bg-success">{{ strtoupper($item->status) }}</span>
                                    @endif
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
