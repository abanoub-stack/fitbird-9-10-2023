            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                {{-- @include('layouts.search') --}}

                <!-- Topbar Navbar -->
                <h6 class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"> Need Support ?  <a href="https://support.stackdeans.com" target="_blank" rel="noopener noreferrer"> Click</a></h6>
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    {{-- @include('layouts.search-xs') --}}

                    <!-- Nav Item - Alerts -->
                    {{-- @include('layouts.notifications') --}}


                    <!-- Nav Item - Messages -->
                    {{-- @include('layouts.messages') --}}


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    @include('layouts.user-info')

                </ul>

            </nav>
            <!-- End of Topbar -->
