<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="{{ url('admin/dashboard') }}" class="sidebar-toggle">
                <img class="svg" src="{{ URL::asset('resources/admin-asset/img/svg/bars.svg') }}" alt="img">
            </a>
            <a class="navbar-brand" href="{{ url('admin/dashboard') }}">
                <img class="svg dark"  src="{{ URL::asset('resources/front-asset/images/pchpl-logo.png') }}" alt="svg">

            </a>
        </div>
        <!-- ends: navbar-left -->
        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-search d-none">
                    <a href="#" class="search-toggle">
                        <i class="la la-search"></i>
                        <i class="la la-times"></i>
                    </a>
                    <form action="/" class="search-form-topMenu">
                        <span class="search-icon" data-feather="search"></span>
                        <input class="form-control mr-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
                    </form>
                </li>
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <?php
                            $user = Auth::guard('admin')->user();
                            $adminObj = App\Models\Admin::where('id',$user->id)->first();
                        ?>
                        <a href="javascript:;" class="nav-item-toggle">
                            @if($adminObj == null)
                                {{-- <h1>hello</h1> --}}
                                <img src="{{ URL::asset('resources/admin-asset/img/default.jpg') }}" alt="" class="rounded-circle"></a>
                                {{-- <img src="{{ URL::asset('public/images/default.jpg') }}" alt="" class="rounded-circle"></a> --}}
                            @else

                                <img src="{{ URL::asset('public/images/side-profile-image.png') }}" alt="" class="rounded-circle"></a>
                            @endif
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    @if($adminObj == null)
                                        <img src="{{ URL::asset('resources/admin-asset/img/default.jpg') }}" alt="" class="rounded-circle">
                                    @else

                                        <img src="{{ URL::asset('public/images/side-profile-image.png') }}" alt="" class="rounded-circle"></a>
                                    @endif
                                </div>
                                <div>
                                    <h6>{{ Auth::user()->first_name }} </h6>
                                    <!-- <span>UI Designer</span> -->
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    {{-- <li>
                                        <a href="{{ url('admin/profile') }}">
                                            <span data-feather="user"></span> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/logo') }}">
                                            <span data-feather="settings"></span> Change Logo
                                        </a>
                                    </li> --}}
                                    {{-- @if(in_array(Auth::user()->is_super,[0,1]))
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}">
                                                <span></span> Dashboard
                                            </a>
                                        </li>
                                    @endif --}}
                                    {{--@if(in_array(Auth::user()->is_super,[1,2,3,4]))
                                        <li>
                                            <a href="{{ route('change-password') }}">
                                            <span data-feather="key"></span> Change Password</a>
                                        </li>
                                    @endif--}}
                                </ul>

                                <a href="{{ route('admin.logout') }}" class="nav-author__signout">
                                    <span data-feather="log-out"></span> Logout
                                </a>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                {{--<a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>--}}
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
