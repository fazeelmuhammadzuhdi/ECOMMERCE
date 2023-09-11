@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{ route('user.profile') }}">Dashboard</a></li>
                        <li><a href="{{ route('user.pending-orders') }}">Orders Pending</a></li>
                        <li><a href="{{ route('user.history') }}">History</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-sm btn-warning"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_main">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
@endsection
