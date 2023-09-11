@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        <h3>FINAL STEP TO PLACE YOUR ORDER</h3>
        <div class="row">
            <div class="col-lg-7">
                <div class="box_main">
                    <h3>Product Will Send At -</h3>
                    <p>City / Village Name - {{ $shippingInformation->city_name }}</p>
                    <p>Phone Number - {{ $shippingInformation->phone_number }}</p>
                    <p>Postal Code - {{ $shippingInformation->postal_code }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="box_main">
                    <div class="table-responsive">
                        <h3>Your Final Product Will Buy -</h3>
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="text-primary">$ {{ $item->price }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6"><b>No Product Has Been Purchased</b></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td class="text-center" colspan="3">Total Bayar</td>
                                    <td class="text-primary">$ {{ $totalBelanja }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <form action="{{ route('user.order') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary mr-3 mb-3">Place Order</button>
            </form>
            <form action="" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form>
        </div>

    </div>
@endsection
