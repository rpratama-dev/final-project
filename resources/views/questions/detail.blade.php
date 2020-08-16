{{--
@foreach($user as $key => $value)

  <h1>Post By {{ $value->name }}</h1>
  <br>
  @foreach($value->question as $question)
  <hr>
  <h3>{{ $question->judul }}</h3>
  <p>{!! $question->isi !!}</p>
  @endforeach
@endforeach--}}

{{-- --}}
@foreach($questions as $key => $value)
  
  <h1>Post By {{ $value->user->name }}</h1>
  <br> 
  <hr>
  <h3>{{ $value->judul }}</h3>
  <p>{!! $value->isi !!}</p> 
@endforeach
