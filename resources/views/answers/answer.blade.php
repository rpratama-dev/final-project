@foreach($answers as $answer) 
<div class="post clearfix">   
    <table class="table border-0 p-0 m-0" style="border:0">
        <tr class=""> 
            <td class="m-0 p-0 " style="width: 50px; border:0">
                <div class="col-md-12" style="font-size: 30px; color:#606060; text-align: center;"> 
                  <a href="{{ route('vote-answer.store') }}"><span class="link-black text-xl col-md-12" 
                    title="This question shows research effort; it is useful and clear">
                      <i class="fas fa-caret-up mr-1" onclick="
                      event.preventDefault(); document.getElementById('answer_upvote{{ $answer->id }}').submit();"></i>
                    </span> </a>
                  <span class="text-xl col-md-12 mr-2"> {{ app(App\Http\Controllers\Answer\VoteAnswerController::class)->count_vote($answer->id) }} </span>
                  <a href="{{ route('vote-answer.store') }}"><span class="link-black col-md-12 text-xl mr-1" title="This question does not show any research effort; it is unclear or not useful"><i class="fas fa-caret-down mr-1"onclick="
                      event.preventDefault(); document.getElementById('answer_downvote{{ $answer->id }}').submit();"></i></span></a>
                </div> 
                @if ($question->jawaban_terbaik_id < 1) 
                  @if(Auth::check())
                    @if ($question->user_id == Auth::user()->id) 
                      <a href="{{ route('answer.update', ['answer' => $answer->id]) }}">
                        <span class="text-xl col-md-12 mr-2 text-secondary" onclick="
                            event.preventDefault(); document.getElementById('best_answer{{ $answer->id }}').submit();"> 
                            <i class="fas fa-check mr-1"></i> 
                        </span>
                      </a> 
                    @endif
                  @endif
                @else
                  @if($answer->is_best_answer > 0)
                    <span class="text-xl col-md-12 mr-2 text-success"> 
                      <i class="fas fa-check mr-1"></i> 
                  </span>
                  @endif
                @endif
                <div> 
                  <form id="answer_upvote{{ $answer->id }}" action="{{ route('vote-answer.store') }}" method="post" style="display: none;">
                  @csrf 
                  <input type="hidden" name="vote_status" value="1"> 
                  <input type="hidden" name="answer_ids" value="{{ $answer->id }}">
                  <input type="hidden" name="question_id" value="{{ $question->id }}">
                  <input type="hidden" name="user_id" value="{{ $answer->user_id }}">
                  </form> 
                  <form id="answer_downvote{{ $answer->id }}" action="{{ route('vote-answer.store') }}" method="post" style="display: none;">
                  @csrf 
                  <input type="hidden" name="vote_status" value="0"> 
                  <input type="hidden" name="answer_ids" value="{{ $answer->id }}">
                  <input type="hidden" name="question_id" value="{{ $question->id }}">
                  <input type="hidden" name="user_id" value="{{ $answer->user_id }}">
                  </form>

                  <form id="best_answer{{ $answer->id }}" action="{{ route('answer.update', ['answer' => $answer->id]) }}" method="post" style="display: none;">
                  @csrf 
                  @method('PUT') 
                  <input type="hidden" name="question_id" value="{{ $question->id }}"> 
                  <input type="hidden" name="answer_id" value="{{ $answer->id }}"> 
                  <input type="hidden" name="user_id" value="{{ $answer->user_id }}"> 
                  </form>
                </div>        
            </td> 
            <td style="border:0">

              {!! $answer->answer !!}

              <div class="row ml-1">
                <div>
                    <div class="float-left">
                      {{--  
                        @foreach (explode (",", $question->tag) as $key => $value)
                            {{ $loop->first ? '' : '' }} 
                        <button type="button" class="btn btn-warning btn-xs">{{ $value }}</button>  
                        @endforeach
                        --}}
                    </div> 
                </div>
                <div class="ml-auto mr-3 mt-2">
                    <div class="user-block float-right">
                        <img class="img-circle img-bordered-sm" src="{{ asset($answer->photo_dir) }}" alt="User Image">
                        <span class="username">
                          <a href="#">{{ $answer->name }}</a> 
                        </span>
                        <span class="description">reputasi ({{ $answer->point_reputasi }})</span>
                    </div> 
                </div>
              </div>
              <dd class="col-sm-12 mb-0">  
                  <table class="table user-block"> 
                     @php 
                      //$answer_comments = app(App\Http\Controllers\Answer\AnswerCommentController::class)->getCommentAnswer($answer->id);  
                     @endphp

                     @foreach(app(App\Http\Controllers\Answer\AnswerCommentController::class)->getCommentAnswer($answer->id) as $answer_coment)
                    <tr class="mt-0 p-0"> 
                      <td class="mt-0 p-0">
                        <span class="description p-0">{{ $answer_coment->comment }} – <a href="">{{ $answer_coment->name }}</a> {{ $answer_coment->created_at }}</span> </td>
                    </tr>
                    @endforeach 
                  </table>
              </dd>
          </td>
      </tr>
  </table> 
  <div class="hide" style="display:none" id="answer{{ $answer->id }}">
      <form class="form-horizontal" method="post" action="{{ route('answer-comment.store') }}">
          @csrf
          <input type="hidden" name="question_id" value="{{ $question->id }}">
          <input type="hidden" name="answer_id" value="{{ $answer->id }}">
          <div class="input-group input-group-sm mb-0" >
              <textarea id="answ_comment" name="answ_comment" class="hide form-control form-control-sm @error('answ_comment') is-invalid @enderror">{{ old('answ_comment') }}</textarea>
              <div class="input-group-append">
                  <button type="submit" class="btn btn-danger">Send</button>
              </div>
        </div>
        @error('answ_comment')
            <span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br>  
            <script> 
              var selectedobj=document.getElementById('answer{{ $answer->id }}');
              selectedobj.style.display = "block";
            </script>
        @enderror
      </form> 
  </div>
  <a href="#" ><span class="link-black text-sm mr-1" onclick="showComment(event, 'answer{{ $answer->id }}')"><i class="fas fa-comment mr-1"></i>Commennt(s)</span> </a>  
</div>
@endforeach