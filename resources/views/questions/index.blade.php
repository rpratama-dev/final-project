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
        @foreach($questions as $question)
        <div class="post clearfix">
            <div class="user-block"> 
                <b><a href="{{ route('question.show', ['question' => 1]) }}">{{ $question->judul }}</a> </b> 
                <div class="float-auto">
                    <span class="text-grey">Asked : {{ $question->created_at }} </span> <b> | </b>
                    <span >Last Update : {{ $question->updated_at }}</span> 
                </div>
                <hr class="mb-0 mt-2 pb-0">
            </div>
          <!-- /.user-block -->  
          {!! $question->isi !!}

            <div class="row ml-1">
              <div>
                <div class="float-left">
                    @foreach (explode (",", $question->tag) as $key => $value)
                        {{ $loop->first ? '' : '' }} 
                    <button type="button" class="btn btn-warning btn-xs">{{ $value }}</button>  
                    @endforeach
                </div> 
              </div>
              <div class="ml-auto mr-3">
                <div class="user-block float-right">
                    <img class="img-circle img-bordered-sm" src="{{ asset($question->photo_dir) }}" alt="User Image">
                    <span class="username">
                      <a href="#">{{ $question->name }}</a> 
                    </span>
                    <span class="description">reputasi ({{ $question->point_reputasi }})</span>
                </div> 
              </div>
            </div>  
            <p class="mb-0">
                <span class="link-black text-sm mr-2"><i class="fas fa-caret-square-up mr-1"></i>{{ $question->votes }} Vote</span> 
                  <span class="link-black text-sm">
                    <i class="far fa-comments mr-1"></i> Answer ({{ $question->answer_count }})
                  </span>
                <span class="float-right">
                </span>
            </p>  
        </div>
        <!-- /.post --> 
        @endforeach
      </div>
        <!-- /.tab-pane -->
    </div> 
@endsection