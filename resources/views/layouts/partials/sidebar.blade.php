  <aside class="main-sidebar sidebar-info-dark elevation-4">
    <!-- Brand Logo -->
    <div class="image">
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Forum Laravel') }}</span>
    </a>
    </div>

    <!-- Sidebar -->
    {{-- < class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @guest
              {{ 'Guest' }}
            @else
              {{ Auth::user()->name }}
            @endguest
          </a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <div class="sidebar">
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                HOME
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('question.create') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                CREATE QUESTIONS
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                TAGS
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                USERS
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-trophy"></i>
              <p>
                TOP LANGUAGE
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
