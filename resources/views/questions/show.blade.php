@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
    <style type="text/css">
    	.fa-check:hover {
		    color: #28a745;
		} 
		.fa-caret-up:hover {
			color: #28a745;
		}
		.fa-caret-down:hover {
			color: #28a745;
		}
    </style>
@endpush
@section('content')

<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2"> 
        <h5 class="card-title ml-2">{{ count($answers) }} Answer</h5> 
        <div class="card-tools mr-2">
          <button type="button" class="btn btn-sm btn-outline-primary text-dark">
            Newest
          </button>
          <button type="button" class="btn btn-sm btn-outline-primary text-dark">
            Unanswered
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle text-dark" data-toggle="dropdown">
              Tools
            </button>
            @if ($question->user_id == Auth::user()->id) 
	            <div class="dropdown-menu dropdown-menu-right" role="menu">
	              <a href="{{ route('question.edit', ['question'=>$question->id ]) }}" class="dropdown-item">Edit</a>
	              <a href="#" class="dropdown-item"><span onclick="
	                      		event.preventDefault(); document.getElementById('delete_question').submit();">Delete</span></a> 
	            </div>
            @endif
          </div> 
        </div>
    </div><!-- /.card-header -->
    <div class="card-body"> 
        <!-- Post -->  
        <div class="post clearfix"> 
            <div class="user-block"> 
                <b><a href="#">{{ $question->judul }}</a> </b> 
                <div class="float-auto">
                    <span class="text-grey">Asked : {{ $question->created_at }} </span> <b> | </b>
					<span >Last Update : {{ $question->updated_at }}</span> <b> | </b> 
					<span>
						<form id="delete_question" action="{{ route('question.destroy',$question->id) }}" method="POST">
							@csrf
							@method('DELETE') 
						</form>
					</span>
                </div>
                <hr class="mb-0 mt-2 pb-0">
            </div>

            <table class="table border-0 p-0 m-0" style="border:0">
	            <tr class=""> 
	                <td class="m-0 p-0 " style="width: 50px; border:0">
	                	<div class="col-md-12" style="font-size: 30px; color:#606060; text-align: center;"> 
                    		<a href="{{ route('vote-question.store') }}"><span class="link-black text-xl col-md-12" 
                    			title="This question shows research effort; it is useful and clear">
	                      		<i class="fas fa-caret-up mr-1" onclick="
	                      		event.preventDefault(); document.getElementById('upvote').submit();"></i>
	                      	</span> </a>
		                    <span class="text-xl col-md-12 mr-2"> {{ app(App\Http\Controllers\Question\VoteQuestionController::class)->count_vote($question->id) }} </span>
		                    <a href="{{ route('vote-question.store') }}"><span class="link-black col-md-12 text-xl mr-1" title="This question does not show any research effort; it is unclear or not useful"><i class="fas fa-caret-down mr-1"onclick="
	                      		event.preventDefault(); document.getElementById('downvote').submit();"></i></span></a>
                  		</div> 
                  		<div> 
			                  <form id="upvote" action="{{ route('vote-question.store') }}" method="POST" style="display: none;">
			                      	@csrf 
          							<input type="hidden" name="status" value="1"> 
          							<input type="hidden" name="question_id" value="{{ $question->id }}">
                        			<input type="hidden" name="user_id" value="{{ $question->user_id }}">
			                  </form> 
			                  <form id="downvote" action="{{ route('vote-question.store') }}" method="POST" style="display: none;">
			                      	@csrf 
          							<input type="hidden" name="status" value="0"> 
          							<input type="hidden" name="question_id" value="{{ $question->id }}">
                        			<input type="hidden" name="user_id" value="{{ $question->user_id }}">
			                  </form>
                  		</div>    
	                </td> 
	                <td style="border:0">
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
				                    <img class="img-circle img-bordered-sm" src="{{ asset($user->photo_dir) }}" alt="User Image">
				                    <span class="username">
				                      <a href="#">{{ $user->name }}</a> 
				                    </span>
				                    <span class="description">reputasi ({{ $user->point_reputasi }})</span>
				                </div> 
			              	</div>
				        </div>
		                <dd class="col-sm-12 mb-0">  
		                    <table class="table user-block">
		                    	@foreach($question_comments as $comment)
			                    <tr class="mt-0 p-0"> 
			                        <td class="mt-0 p-0">
			                          	<span class="description p-0">{!! $comment->comment !!}. – <a href="">{{ $comment->name }}</a> {{ $comment->created_at }}</span> </td>
			                    </tr>
			                    @endforeach 
		                    </table>
		                </dd>
	                </td>
	            </tr>
	        </table> 
            <div class="hide" style="display:none" id="question_comment">
	            <form class="form-horizontal" method="post" action="{{ route('question-comment.store') }}">
	            	@csrf
	            	<input type="hidden" name="question_id" value="{{ $question->id }}">
		            <div class="input-group input-group-sm " >
		                <textarea id="ques_comment" name="ques_comment" 
		                class="form-control form-control-sm @error('ques_comment') is-invalid @enderror">{{ old('ques_comment') }}</textarea>
		                <div class="input-group-append">
		                  <button type="submit" class="btn btn-danger">Send</button>
		                </div>
		            </div> 
		                @error('ques_comment')
		                  <span class="text-danger mr-5 pr-3" style="font-size: 12.8px;">{{ $message }}</span><br> 
		                   <script> 
								var selectedobj=document.getElementById('question_comment');
								selectedobj.style.display = "block";
						    </script>
		                @enderror 
	            </form> 
	        </div>
            <a href="#" ><span class="link-black text-sm mr-1" onclick="showComment(event, 'question_comment')"><i class="fas fa-comment mr-1"></i>Commennt(s)</span> </a>  
        </div> 
        <!-- /.post -->   

        <!-- section best answer --> 
        @include('answers.best_answer')
 
        <!-- section answer --> 
        @include('answers.answer')

        <!-- section post answer --> 
        @include('answers.post_answer')
      </div>
        <!-- /.tab-pane -->
    </div> 
@endsection

@push('scripts')
	<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script> 
	
	<script type="text/javascript">
 
        $(function () {  
	        // Summernote
	        $('.textarea').summernote()
        }) 

		function showComment(e, element) {

    		e.preventDefault();
			var selectedobj=document.getElementById(element);

			if(selectedobj.className=='hide'){  //check if classname is hide 
				selectedobj.style.display = "block";
				selectedobj.readOnly=true;
				selectedobj.className ='show';
			}else{
				selectedobj.style.display = "none";
				selectedobj.className ='hide';
			}
		}	
	</script>
@endpush