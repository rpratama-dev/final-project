

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('welcome') }}" class="brand-link">
      <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Forum Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      {{--
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      --}}

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview" role="menu" data-accordion="false">
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
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-tag">
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
      <div class="modal fade" id="modal-tag">
        <form role="form" id="form_tag" method="post" action="{{ route('tag.store') }}"> 
          @csrf
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Input Tag</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group mb-3"> 
                    <input type="text" class="form-control text-dark taginput" id="tag" name="tag" placeholder="Enter Tag ..." data-role="tagsinput">
                    <input type="hidden" class="form-control text-dark" id="tag_name" name="tag_name" placeholder="">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-info" onclick="add_tag()">Add Tag</button>
                    </div>
                    <!-- /btn-group -->
                  </div> 
                </div>
                <div class="form-group">
                  <label>List tag to save, dont forget to click Save Change</label>
                  <select multiple class="form-control" id="tags" name="tags[]"> 
                  </select>  
                  </select>
                  <div class="input-group-prepend float-left mt-1">
                      <button type="button" class="btn btn-sm btn-danger" onclick="remove_tag()">Remove Selected Tag</button>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="validate()">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
        </form>
        <!-- /.modal-dialog -->
      </div>