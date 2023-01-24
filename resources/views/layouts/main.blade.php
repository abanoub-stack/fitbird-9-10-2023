<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/', []) }}"><span class="text-primary"
                style="font-size: 29px">A</span>dmin Pane<span class="text-primary" style="font-size: 29px">L</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item @if (request()->is('categories') ||
                    request()->is('add-category') ||
                    request()->is('edit-category/*') ||
                    request()->is('categories/search')) active @endif">
                    <a class="nav-link" href="{{ url('/categories', []) }}">Categories</a>
                </li>
                <li class="nav-item @if (request()->is('exercises') ||
                    request()->is('add-exercise') ||
                    request()->is('edit-exercise/*') ||
                    request()->is('exercise-steps/*') ||
                    request()->is('add-exercise-step/*') ||
                    request()->is('exercises/search')) active @endif">
                    <a class="nav-link" href="{{ url('/exercises', []) }}">Exercises</a>
                </li>
                <li class="nav-item @if (request()->is('sets') || request()->is('edit-set/*') || request()->is('add-set')) active @endif">
                    <a class="nav-link" href="{{ url('/sets', []) }}">Exercise Sets</a>
                </li>
                <li class="nav-item @if (request()->is('packages') || request()->is('packages/show/*') || request()->is('packages/add')) active @endif">
                    <a class="nav-link" href="{{ url('/packages', []) }}">Packages</a>
                </li>
                <li class="nav-item @if (request()->is('users') || request()->is('user/*')) active @endif">
                    <a class="nav-link" href="{{ url('/users', []) }}">Users List</a>
                </li>
                <li class="nav-item @if (request()->is('send-notifications')) active @endif">
                    <a class="nav-link" href="{{ url('/send-notifications', []) }}">Send Notifications</a>
                </li>
                <li class="nav-item @if (request()->is('android-notification')) active @endif">
                    <a class="nav-link" href="{{ url('/android-notification', []) }}">Android Notifications</a>
                </li>
                <li class="nav-item @if (request()->is('ios-notification')) active @endif">
                    <a class="nav-link" href="{{ url('/ios-notification', []) }}">IOS Notifications</a>
                </li>

                {{-- Questions update --}}
                <li class="nav-item @if (request()->is('questions')) active @endif">
                    <a class="nav-link" href="{{ url('/questions', []) }}">Questions</a>
                </li>
                {{-- Questions update --}}


                @if (auth()->user()->role == 'SUPER_ADMIN')
                    <li class="nav-item @if (request()->is('admins') || request()->is('admins/add')) active @endif">
                        <a class="nav-link text-info" href="{{ url('/admins', []) }}">Admins List</a>
                    </li>
                    <li class="nav-item @if (request()->is('notifications')) active @endif">
                        <a class="nav-link text-info" href="{{ url('/notifications', []) }}">Admins Notifiactions</a>
                    </li>
                    <li class="nav-item @if (request()->is('notifications')) active @endif">
                        <a class="nav-link text-info" href="{{ url('/app-notifications', []) }}">Mobile App
                        </a>
                    </li>
                @endif

                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item dropdown">
                        <div class="dropdown text-center mr-5 container-fluid">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Membership
                            </button>
                            <div class="dropdown-menu text-center " aria-labelledby="dropdownMenuButton">
                                <a class="nav-link text-dark" href="{{ url('price', []) }}" id=""
                                    role="button" aria-expanded="false">
                                    Subscription Price
                                </a>
                                <a class="nav-link text-dark" href="{{ url('users/premium', []) }}" id=""
                                    role="button" aria-expanded="false">
                                    Premium Users
                                </a>
                                <a class="nav-link text-dark" href="{{ url('payment/history', []) }}" id=""
                                    role="button" aria-expanded="false">
                                    Payment History
                                </a>
                            </div>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/profile', []) }}">Profile</a>
                            <a class="dropdown-item" href="{{ url('/notifications', []) }}">Notifications</a>
                            <a class="dropdown-item" href="{{ url('/logout', []) }}">Logout</a>
                        </div>
                    </li>
                </ul>

            </ul>
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <div class="dropdown text-center mr-5 container-fluid">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <div class="dropdown-menu text-center bg-light" aria-labelledby="dropdownMenuButton">
                            <a class="nav-link text-dark" href="{{ url('profile', []) }}" id=""
                                role="button" aria-expanded="false">
                                Profile
                            </a>
                            <a class="nav-link text-dark" href="{{ url('logout', []) }}" id=""
                                role="button" aria-expanded="false">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/profile', []) }}">Profile</a>
                        <a class="dropdown-item" href="{{ url('/notifications', []) }}">Notifications</a>
                        <a class="dropdown-item" href="{{ url('/logout', []) }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    @if ($errors->any())
    <br>
    <ul class=" alert alert-danger list-unstyled mb-2 col-8 m-auto" style="text-align: center">
        @foreach ( $errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    </ul>
    <br>
    @endif



    @if (Session::has('success'))
    <div class="col-lg-12 m-auto mt-5">
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('success')}}</strong>
        </div>
    </div>
    
    @endif
    @yield('main')
    @yield('js')
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableData tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>
