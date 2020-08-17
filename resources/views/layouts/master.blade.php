<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/taginput/tagsinput.css') }}"> 

  @stack('styles')

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.partials.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts/partials/sidebar')
  <!-- /.main-side -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              {{ !empty($page) ? $page : 'Page' }}
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Ini Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid-->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Yield Content -->


      @if(session('success'))
          <div class="alert alert-{{ session('alert') }} alert-dismissible">
          <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> {{ session('alert') }}!</h5>
          {{ session('success')}}
          </div>
      @endif

      @yield('content')

      <!-- /.conten -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  @include('layouts.partials.footer')
  <!-- /footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/adminlte/dist/js/demo.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{ asset('/adminlte/plugins/taginput/tagsinput.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/taginput/typehead.js') }}"></script>

<script>  
$("#tag").tagsinput({
    splitOn: ','
});

  function add_tag() {
      event.preventDefault();
      var sel = document.getElementById("tags");
      var tag_name = document.getElementById("tag");
      var tag_names = document.getElementById("tag_name");
      if(tag_name.value != ""){
        var opt = document.createElement('option'); 
        opt.appendChild( document.createTextNode(tag_name.value) ); 
        opt.value = tag_name.value;  
        sel.appendChild(opt); 
        tag_names.value += tag_name.value + ',';
      }else{
        alert('Tag is empty!');
      }
  }

  function remove_tag() {
      event.preventDefault();
      var x = document.getElementById("tags");
      x.remove(x.selectedIndex);
  }

  function validate(){
      event.preventDefault();
      var x = document.getElementById("tags");
      var option = document.createElement("option");
      if( $('#tags').has('option').length < 1 ) {
        alert("Hello! List of Tag is empty!!");
      }else{
        event.preventDefault(); 
        var tag_names = document.getElementById("tag_name");
        tag = tag_names.value;
        tag = tag.slice(0, tag.length - 1);
        tag_names.value = tag;
        document.getElementById('form_tag').submit();
      }
  }

</script> 
<!-- receive push script from other page -->
@stack('scripts')

</body>
</html>
