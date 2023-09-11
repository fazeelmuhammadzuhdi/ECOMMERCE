@extends('frontend.layouts.main')

@section('content')
    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
                <h1 class="fashion_taital">
                    PROVIDE YOUR SHIPPINGG ADDRESS INFORMATION
                </h1>
                <div class="row">
                    <div class="col-12">
                        <div class="box_main">
                            <form action="{{ route('user.add-shipping-address') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror" placeholder="+62"
                                        aria-describedby="helpId"
                                        value="{{ old('phone_number', $shippingInfo?->phone_number) }}">
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="city_name" class="form-label">City / Village Name </label>
                                    <input type="text" name="city_name" id="city_name"
                                        class="form-control @error('city_name') is-invalid @enderror"
                                        placeholder="West Sumatra" aria-describedby="helpId"
                                        value="{{ old('city_name', $shippingInfo?->city_name) }}">
                                    @error('city_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" id="postal_code"
                                        class="form-control @error('postal_code') is-invalid @enderror" placeholder="25227"
                                        aria-describedby="helpId"
                                        value="{{ old('postal_code', $shippingInfo?->postal_code) }}">
                                    @error('postal_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info">Next</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
