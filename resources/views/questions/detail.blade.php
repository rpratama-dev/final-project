@extends('layouts.master')

@push('styles')
  <!-- Summernote WYSIWG -->  
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
    <style type="text/css">
      .fixed-row{
          height: 30px;
      }

    </style>
@endpush

@section('content')
<div class="col-md-12 m-0 p-0">
    <div class="card card-widget m-0 p-0">
	    <div class="card-header"> 
	        <h5 class="card-title ml-2">2 Answers</h5>

	        <div class="card-tools mr-2">
	          <div class="btn-group">
              <button class="btn btn-default">Left</button>
              <button class="btn btn-default">Middle</button>
              <button class="btn btn-default">Right</button>
            </div>
	        </div>
	    </div>
      <!-- /.card-header -->
      <div class="card-body"> 
        <!-- Post -->
        <div class="post clearfix m-0 p-0">
          <div class="row ml-1">
            <div>
              <div class="float-left">
                <div class="user-block"> 
                    <b><a href="#">{{ $question->judul }}</a> </b> 
                    <div class="float-auto">
                      <span class="text-grey">Asked : {{ $question->created_at }} </span> <b> | </b>
                          <span >Last Update : {{ $question->updated_at }}</span> 
                    </div>
                </div>
              </div> 
            </div> 
          </div> 
          <div class="user-block float-right mt-2">  
            <table class="table border-0" style="border:0">
              <tr class="m-0 p-0"> 
                <td class="m-0 p-0 " style="width: 50px;">
                  <div class="col-md-12" style="font-size: 30px; color:#606060; text-align: center;"> 
                    <span class="link-black text-xl col-md-12" title="This question shows research effort; it is useful and clear">
                      <i class="fas fa-caret-up mr-1"></i></span> 
                    <span class="text-xl col-md-12 mr-2"> 0 </span>
                    <span class="link-black col-md-12 text-xl mr-1" title="This question does not show any research effort; it is unclear or not useful"><i class="fas fa-caret-down mr-1"></i></span>
                  </div>  
                </td>
                <td class="mt-0 p-0">
                  <div class="mt-2">
                    {!! $question->isi !!}
                  </div> 
                  <div class="row ml-1">
                    <div>
                      {{--  
                      <div class="float-left">
                          @foreach (explode (",", $question->tag) as $key => $value)
                                {{ $loop->first ? '' : '' }} 
                            <button type="button" class="btn btn-warning btn-xs">{{ $value }}</button>  
                            @endforeach
                      </div> 
                      --}}
                    </div>
                    <div class="ml-auto mr-3">
                      <div class="user-block float-right">
                          <img class="img-circle img-bordered-sm" src="{{ asset('adminlte/dist/img/user7-128x128.jpg') }}" alt="User Image">
                          <span class="username">
                            <a href="#">asasa</a> 
                          </span>
                          <span class="description">reputasi ()</span>
                      </div> 
                    </div> 
                  </div> 
                  <dd class="col-sm-12 mb-0">  
                    <table class="table">
                      <tr class="mt-0 p-0"> 
                        <td class="mt-0 p-0">
                          <span class="description p-0">Just change the entities() in html.php in the laravel folder, to suit your needs. Add the escaping url function there and it'l get implemented. – <a href="">itachi</a> Jan 7 '13 at 17:23</span> </td>
                      </tr>
                      <tr class="m-0 p-0"> 
                        <td class="m-0 p-0">
                          <span class="description p-0">Just change the entities() in html.php in the laravel folder, to suit your needs. Add the escaping url function there and it'l get implemented. – <a href="">itachi</a> Jan 7 '13 at 17:23</span> </td>
                      </tr>
                    </table>
                    <p class="mb-0">
                      <div class="hide" style="display:none" id="question_comment">
                        <form class="form-horizontal">
                          <div class="input-group input-group-sm mb-0" >
                            <textarea id="ques_comment" name="ques_comment" class="hide form-control form-control-sm @error('ques_comment') is-invalid @enderror">
                              {{ old('ques_comment') }}
                            </textarea>
                            @error('answer')
                              <span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
                            @enderror
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-danger">Send</button>
                            </div>
                          </div>
                        </form> 
                      </div>
                        <a href="#" ><span class="link-black text-sm mr-1" onclick="showComment()"><i class="fas fa-comment mr-1"></i>Commennt(s)</span> </a>
                    </p> 
                  </dd> 
                </td> 
            </table>  
          </div>
          

          
        <!-- /.post --> 

        <!-- section best answer --> 
        @include('answers.best_answer')
 
        <!-- section answer --> 
        @include('answers.answer')

        <!-- section post answer --> 
        @include('answers.post_answer')

      </div> 
    </div> 
    </tr> 
@endsection

@push('scripts')
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script> 
    <script>
        $(function () {  
         Summernote
        $('.textarea').summernote()
        })

        //UPDATE your_table SET poll = poll + 1 WHERE sn = $val
        $("#vote_button").click(function(){
            if($("input[type='radio'][name='optionsRadios']:checked").length > 0){
            var chosenvalue = $("input[type='radio'][name='optionsRadios']:checked").val();
            var dataString = 'paramX=' + chosenvalue;
            $.ajax({
                type: "POST",
                url: "yourfile.php",
                data: dataString,
                cache: false,
                success: function (html) {
                }
            });
          }
        });

        function showComment() {
          var selectedobj=document.getElementById('question_comment');

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

