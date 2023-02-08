        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a  href="{{ url('/', []) }}" class="sidebar-brand d-flex align-items-center justify-content-center">
                {{-- <div class="sidebar-brand-icon rotate-n-15"> --}}
                <div class="sidebar-brand-icon ">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{ asset('dashboard/logo.png') }}" style="width: 100px ; object-fit: contain" alt="Fitbird Logo">
                </div>
                {{-- <div  class="sidebar-brand-text mx-3">FitBird</div> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/', []) }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mobile Application
            </div>

            <!-- Nav Item - Categories -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ url('/categories', []) }}">
                    <i class="fas fa-external-link-square-alt    "></i>
                    <span>Categories</span></a>
            </li>


            <!-- Nav Item - Sub weeks -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ url('/weeks', []) }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Subscribe Weeks Panel</span>
                </a>
            </li>


            <!-- Nav Item - Exercises -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ExercisesCollapse"
                    aria-expanded="true" aria-controls="ExercisesCollapse">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Exercises</span>
                </a>
                <div id="ExercisesCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exercises Actions:</h6>
                        <a class="collapse-item" href="{{ url('/exercises', []) }}">List Premium Exercises</a>
                        <a class="collapse-item" href="{{ url('/free_exercises', []) }}">List Free Exercises</a>
                        {{-- <a class="collapse-item" href="{{ url('/sets', []) }}">Exercises Sets</a> --}}
                        <a class="collapse-item" href="{{ route('tsection.index') }}">Training Sections</a>

                    </div>
                </div>
            </li>


            <!-- Nav Item - Packages -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ url('/packages', []) }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Packages</span></a>
            </li>




            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ url('/users', []) }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>



            <!-- Nav Item - Progress Reports -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ url('/progress-reports', []) }}">
                    <i class="fas fa-chart-bar    "></i>
                    <span>Progress Reports</span></a>
            </li>




            <!-- Nav Item - MemberShip -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#MembershipCollapse"
                    aria-expanded="true" aria-controls="MembershipCollapse">
                    <i class="fas fa-credit-card"></i>
                    <span>Membership</span>
                </a>
                <div id="MembershipCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exercises Actions:</h6>
                        <a class="collapse-item" href="{{ url('/price', []) }}">Subscription Price</a>
                        <a class="collapse-item" href="{{ url('/users/premium', []) }}">Premium Users</a>
                        <a class="collapse-item" href="{{ url('/payment/history', []) }}">Payment History</a>

                    </div>
                </div>
            </li>



             <!-- Nav Item - Questions -->
             <li class="nav-item">
                <a class="nav-link"  href="{{ url('/questions', []) }}">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>Questions</span></a>
            </li>


            <!-- Nav Item - Questions -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('banner.index') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Banner</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Settings
            </div>


            @if (auth()->user()->role == 'SUPER_ADMIN')
            <!-- Nav Item - Admins -->
            <li class="nav-item">
                <a class="nav-link"  href="{{ url('/admins', []) }}">
                <i class="fas fa-fw fa-lock"></i>
                <span>Admins</span></a>
            </li>
            @endif


            <!-- Nav Item - Notifications -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#NotificationsCollapse"
                    aria-expanded="true" aria-controls="NotificationsCollapse">
                    <i class="fas fa-fw fa-inbox"></i>
                    <span>Notifications</span>
                </a>
                <div id="NotificationsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Notifications Actions:</h6>
                        <a class="collapse-item" href="{{ url('/send-notifications', []) }}">
                            <i class="far my-1 fa-arrow-alt-circle-right"></i>
                                    Send Notifications
                        </a>
                        <a class="collapse-item" href="{{ url('/android-notification', []) }}">
                            <i class="fab fa-android my-1"></i>
                                    Android Notifications
                        </a>
                        <a class="collapse-item" href="{{ url('/ios-notification', []) }}">
                            <i class="fab fa-apple my-1"></i>
                                    IOS Notifications
                        </a>
                    @if (auth()->user()->role == 'SUPER_ADMIN')
                        <a class="collapse-item" href="{{ url('/notifications', []) }}">
                            <i class="fa my-1 fa-lock"></i>
                                    Admins Notifications
                        </a>
                        <a class="collapse-item" href="{{ url('/app-notifications', []) }}">
                            <i class="fa my-1 fa-mobile"></i>
                                    Mobile App Notifications
                        </a>
                    @endif
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            {{-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('dashboard/img/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> --}}

        </ul>
        <!-- End of Sidebar -->
