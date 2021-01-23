<section>
    <div class="col-sm-12 text-center header pb-1">
        <h2 class="font-weight-bold p-1 m-0">Web Site Title</h2>
        <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">{{ Auth::user()->name}}</h5>
        <p class="font-weight-bold mb-0">139/1,Tejkunipara Dhaka-1209</p>
        <p class="font-weight-bold mb-0">Mobile:{{Auth::user()->mobile}}</p>
    </div>
</section>
<!--Header End-->

<!--User Avatar Start-->
<img class="avatar" src="@if(Auth::user()->avatar){{asset('/').'/'.$user->avatar}}@else{{asset('/')}}/admin/assets/images/avatar.png @endif" alt="Avatar">
<!--User Avatar Start-->

<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="{{route('student-registration-form')}}">Registration</a></li>
                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Attendance
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="form.html">Reg</a></li>
                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Home Work
                </a>
{{--                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                    <li class=""><a class="dropdown-item" href="form.html">Registration</a></li>--}}
{{--                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>--}}
{{--                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>--}}
{{--                </ul>--}}
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SMS
                </a>
{{--                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                    <li class=""><a class="dropdown-item" href="form.html">Registration</a></li>--}}
{{--                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>--}}
{{--                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>--}}
{{--                </ul>--}}
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Result
                </a>
{{--                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                    <li class=""><a class="dropdown-item" href="form.html">Registration</a></li>--}}
{{--                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>--}}
{{--                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>--}}
{{--                </ul>--}}
            </li>



            <li class="nav-item">
                <a class="nav-link" href="{{route('photo-gallery')}}">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-school')}}" class="dropdown-item">Add School</a></li>
                            <li><a href="{{route('school-list')}}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-class')}}" class="dropdown-item">Add Class</a></li>
                            <li><a href="{{route('class-list')}}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-batch')}}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{route('batch-list')}}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item" href="{{route('student-type')}}">Student Type</a>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Slider</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-slider')}}" class="dropdown-item">Add Slider</a></li>
                            <li><a href="{{route('manage-slide')}}" class="dropdown-item">Manage Slider</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Users</a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->role=='Admin')
                            <li><a href="{{route('user-registration')}}" class="dropdown-item">Add User</a></li>
                            <li><a href="{{route('user-list')}}" class="dropdown-item">Users List</a></li>
                             @endif
                            <li><a href="{{route('user-profile',['userId'=>Auth::user()->id])}}" class="dropdown-item">User Profile</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
        </ul>

        {{--<a class="" href="#">Logout</a>--}}
        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
