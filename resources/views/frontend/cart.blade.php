@extends('frontend.layouts.main')

@section('content')
    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
                <h1 class="fashion_taital">
                    List of Products Purchased
                </h1>
                <div class="row">
                    <div class="col-12">
                        <div class="box_main">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @php
                                            $total = 0;
                                        @endphp --}}
                                        @forelse ($cart as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset($item->product_image) }}" alt="No Image"
                                                        style="height: 40px; text-align: center">
                                                </td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td class="text-primary">$ {{ $item->price }}</td>
                                                <td>
                                                    <form action="{{ route('user.cart-delete', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            {{-- @php
                                                $total += $item->price;
                                            @endphp --}}
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="6"><b>No Product Has Been Purchased</b></td>
                                            </tr>
                                        @endforelse
                                        @if ($totalBelanja > 0)
                                            <tr>
                                                <td class="text-center" colspan="4">Total Bayar</td>
                                                <td class="text-primary">$ {{ $totalBelanja }}</td>
                                                <td>
                                                    <a href="{{ route('user.shipping-address') }}"
                                                        class="btn btn-primary">Checkout Now</a>
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
