<nav class="side-navbar z-index-40">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ asset('storage/'.auth()->user()->profile->photo) }}" alt="...">
            <div class="ms-3 title">
              <a href="/profile/{{ auth()->user()->username }}" class="h4 mb-2">{{ ucfirst(auth()->user()->username) }}</a>
              
              <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
          <ul class="list-unstyled py-4">
            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}"><a class="sidebar-link" href="{{ route('dashboard') }}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#real-estate-1"> </use>
                </svg>Home </a></li>
            <li class="sidebar-item {{ request()->is('pemberhentian') ? 'active' : '' }}"><a class="sidebar-link" href="{{ route('stasiunkereta') }}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Pemberhentian </a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown3" data-bs-toggle="collapse"> 
                <i class="fa-solid fa-user fa-xl">
                  <use xlink:href="#browser-window-1"> </use>
                </i>&nbsp;
                  Users </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown3">
                  <li class=" sidebar-item {{ request()->is('admin/staff') ? 'active' : '' }}"><a class="sidebar-link " href="/admin/staff">Staff</a></li>
                  <li class="sidebar-item {{ request()->is('admin/customer') ? 'active' : '' }} "><a class="sidebar-link " href="/admin/customer">Customer  </a></li>
                  <li><a class="sidebar-link" href="#">Page</a></li>
                </ul>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown1" data-bs-toggle="collapse"> 
                
                <i class="fa-solid fa-train fa-xl " >
                  <use xlink:href="#browser-window-1"> </use>
                </i> &nbsp;
                Trains </a>
              <ul class="collapse list-unstyled " id="exampledropdownDropdown1">
                <li class=" sidebar-item {{ request()->is('admin') ? 'active' : '' }}"><a class="sidebar-link " href="/admin">Manage Train</a></li>
                <li class="sidebar-item {{ request()->is('stasiun') ? 'active' : '' }} "><a class="sidebar-link " href="/stasiun">Manage Station  </a></li>
                <li><a class="sidebar-link" href="#">Page</a></li>
              </ul>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                
            <i class="fa-sharp fa-solid fa-person fa-xl">
                  <use xlink:href="#browser-window-1"> </use>
                </i> &nbsp;
                Passangers </a>
              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                <li class=" sidebar-item {{ request()->is('add-passanger') ? 'active' : '' }}"><a class="sidebar-link " href="/add-passanger">Add Passangers</a></li>
                <li class=" sidebar-item {{ request()->is('manage-passanger') ? 'active' : '' }}"><a class="sidebar-link " href="/manage-passanger">Manage Passangers</a></li>
                <li><a class="sidebar-link" href="#">Page</a></li>
              </ul>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown2" data-bs-toggle="collapse"> 
                
            <i class="fa-sharp fa-solid fa-ticket fa-xl">
                  <use xlink:href="#browser-window-1"> </use>
                </i> &nbsp;
                Tickets </a>
              <ul class="collapse list-unstyled " id="exampledropdownDropdown2">
                <li class=" sidebar-item {{ request()->is('status-sudah') ? 'active' : '' }}"><a class="sidebar-link " href="/status-sudah">Ticket <div class="badge bg-success">sudah</div></a></li>
                <li class=" sidebar-item {{ request()->is('status-belum') ? 'active' : '' }}"><a class="sidebar-link " href="/status-belum">Ticket <div class="badge bg-secondary">belum</div></a></li>
                
                <li><a class="sidebar-link" href="#">Page</a></li>
              </ul>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="login.html"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#disable-1"> </use>
                </svg>Login page </a></li>
          </ul>
        </nav>