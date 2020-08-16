@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
            <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-success">
                    {{-- <h3 class="widget-user-username">{{ $user->name }}</h3>
                    <h5 class="widget-user-desc">{{ $user->email }}</h5>  --}}
                    <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                    <h5 class="widget-user-desc">{{ Auth::user()->email }}</h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ Auth::user()->photo_dir }}" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          {{-- <h5 class="description-header">{{ count($user->questions) }}</h5> --}}
                          <h5 class="description-header">{{ app(App\Http\Controllers\Question\QuestionController::class)->getTotalQuestionByUser() }}</h5>
                          <span class="description-text">Questions</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          {{-- <h5 class="description-header">{{ $user->reputation->point }}</h5> --}}
                          <h5 class="description-header">{{ Auth::user()->point_reputasi }}</h5>
                          <span class="description-text">Reputation</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          {{-- <h5 class="description-header">{{ count($user->answers) }}</h5> --}}
                          <h5 class="description-header">{{ app(App\Http\Controllers\Answer\AnswerController::class)->getTotalAnswerByUser() }}</h5>
                          <span class="description-text">Answers</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>
              <!-- /.col -->
    </div>
</div>


@endsection
