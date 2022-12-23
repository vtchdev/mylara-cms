
          <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar"
        >
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>

                <form action="{{ route('admin_search') }}" method="GET">

                <input
                  type="text" type="text"
                  name="search"
                  required
                  class="form-control border-0 shadow-none"
                  placeholder="ძებნა ..."
                  aria-label="ძებნა ..."
                />

            </form>

              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
               {{--PLACE --}}
              </li>

             @include('admin.user')
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->
