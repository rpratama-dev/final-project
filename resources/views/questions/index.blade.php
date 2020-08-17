@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2"> 
        <h5 class="card-title ml-2">{{ count($questions) }} questions</h5>

          <div class="card-tools mr-2">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
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
        </div>
    </div><!-- /.card-header -->
    <div class="card-body"> 
        <!-- Post -->
         {{-- @foreach($questions as $question) --}}
        @foreach($questions as $key => $question)
        <div class="post clearfix">
            <div class="user-block"> 
                <b><a href="{{ route('question.show', ['question' => $question->id]) }}">{{ $question->judul }}</a> </b> 
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
                <div class="float-left">{{-- $value->pivot->tag_id get vivot data --}}
                    @foreach ($question->tags as $key => $value) 
                      <a href="{{ route('question.tag-post', ['tag_id' => $value->pivot->tag_id ]) }}"><button type="button" class="btn btn-warning btn-xs">{{ $value->tag_name }}</button></a>  
                    @endforeach
                </div> 
              </div>
              <div class="ml-auto mr-3">
                <div class="user-block float-right">
                    <img class="img-circle img-bordered-sm" src="{{ asset($question->user->photo_dir) }}" alt="User Image">
                    <span class="username">
                      <a href="{{ route('question.user-post', ['user_id' => $question->user->id ]) }}">{{ $question->user->name }}</a> 
                    </span>
                    <span class="description">reputasi ({{ $question->user->point_reputasi }})</span>
                </div> 
              </div>
            </div>  
            <p class="mb-0">
                <span class="link-black text-sm mr-2"><i class="fas fa-caret-square-up mr-1"></i>{{ $question->votes }} Vote</span> 
                  <span class="link-black text-sm">
                    <i class="far fa-comments mr-1"></i> Answer ({{ count($question->answer) }})
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