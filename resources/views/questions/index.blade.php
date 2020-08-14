@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2"> 
        <h5 class="card-title ml-2">154,034 questions</h5>

        <div class="card-tools mr-2">
          <button type="button" class="btn btn-sm btn-outline-primary text-dark">
            Newest
          </button>
          <button type="button" class="btn btn-sm btn-outline-primary text-dark">
            Unanswered
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle text-dark" data-toggle="dropdown">
              More
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="#" class="dropdown-item">Action</a>
              <a href="#" class="dropdown-item">Another action</a>
              <a href="#" class="dropdown-item">Something else here</a>
              <a class="dropdown-divider"></a>
              <a href="#" class="dropdown-item">Separated link</a>
            </div>
          </div> 
        </div>
    </div><!-- /.card-header -->
    <div class="card-body"> 
        <!-- Post -->
        <div class="post clearfix">
            <div class="user-block"> 
                <b><a href="#">Judul Pertanyaan</a> </b> 
                <div class="float-auto">
                    <span class="text-grey">Asked : 12-08-2020 15:00:00 </span> <b> | </b>
                    <span >Viewed 8K</span> 
                </div>
                <hr class="mb-0 mt-2 pb-0">
            </div>
          <!-- /.user-block -->  
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>

            <div class="row ml-1">
              <div>
                <div class="float-left">
                    <button type="button" class="btn btn-warning btn-xs"> Tags</button> 
                    <button type="button" class="btn btn-warning btn-xs"> Tags</button> 
                    <button type="button" class="btn btn-warning btn-xs"> Tags</button> 
                    <button type="button" class="btn btn-warning btn-xs"> Tags</button> 
                    <button type="button" class="btn btn-warning btn-xs"> Tags</button> 
                    <button type="button" class="btn btn-warning btn-xs"> Tags</button> 
                </div> 
              </div>
              <div class="ml-auto mr-3">
                <div class="user-block float-right">
                    <img class="img-circle img-bordered-sm" src="{{ asset('adminlte/dist/img/user7-128x128.jpg') }}" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a> 
                    </span>
                    <span class="description">reputasi (10)</span>
                </div> 
              </div>
            </div>  
            <p class="mb-0">
                <span class="link-black text-sm mr-2"><i class="fas fa-caret-square-up mr-1"></i> 2 upvote </span>
                <span class="link-black text-sm"><i class="fas fa-caret-square-down mr-1"></i> 3 downvote </span>
                <span class="float-right">
                  <span class="link-black text-sm">
                    <i class="far fa-comments mr-1"></i> Answer (5)
                  </span>
                </span>
            </p>  
        </div>
        <!-- /.post --> 
        </div>
        <!-- /.tab-pane -->
    </div> 
@endsection