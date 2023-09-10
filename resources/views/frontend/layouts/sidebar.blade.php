@php
    $category = \App\Models\Category::latest()->get();
@endphp
<div class="header_section">
    <div class="container">
        <div class="containt_main">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{ route('home') }}">Home</a>
                @foreach ($category as $item)
                    <a href="{{ route('category', [$item->id, $item->slug]) }}">{{ $item->category_name }}</a>
                @endforeach
            </div>
            <span class="toggle_icon" onclick="openNav()"><img src="{{ asset('home/images/toggle-icon.png') }}"></span>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($category as $item)
                        <a class="dropdown-item"
                            href="{{ route('category', [$item->id, $item->slug]) }}">{{ $item->category_name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="main">
                <!-- Another variation with a button -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this blog">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"
                            style="background-color: #f26522; border-color:#f26522 ">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="header_box">
                <div class="login_menu">
                    <ul>
                        <li><a href="{{ route('user.cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="padding_10">Cart</span></a>
                        </li>
                        <li><a href="#">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="padding_10">Cart</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
