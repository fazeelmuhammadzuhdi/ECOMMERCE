 <div class="container">
     <div class="header_section_top">
         <div class="row">
             <div class="col-sm-12">
                 <div class="custom_menu">
                     <ul>
                         <li><a class="btn btn-sm btn-primary nav-link text-white" href="{{ route('home') }}">Home</a>
                         </li>
                         <li><a class="btn btn-sm btn-secondary nav-link text-white" href="#">Gift Ideas</a></li>
                         <li><a class="btn btn-sm btn-success nav-link text-white" href="#">New Releases</a></li>
                         <li><a class="btn btn-sm btn-danger nav-link text-white" href="#">Today's Deals</a></li>
                         <li><a class="btn btn-sm btn-warning nav-link text-white" href="#">Customer Service</a>
                         </li>
                         @guest
                             <li class="nav-item">
                                 <a class="btn btn-sm btn-info nav-link text-white" href="{{ route('register') }}">Sign
                                     Up</a>
                             </li>
                             <li class="nav-item">
                                 <a class="btn btn-dark nav-link text-white" href="{{ route('login') }}">Sign In</a>
                             </li>
                         @endguest
                         @auth
                             <li><a href="{{ route('user.profile') }}" class="btn btn-light nav-link text-danger">Profile</a>
                             </li>

                             {{-- <span class="text-white"> Hi, {{ Auth::user()->name }}</span>
                             <li>
                                 <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                     <button
                                         onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                         Logout
                                     </button>
                                 </form>

                             </li> --}}
                         @endauth
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>
