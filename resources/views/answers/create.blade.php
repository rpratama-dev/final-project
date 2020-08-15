@extends('layouts.master')

@push('styles')
  <!-- Tempusdominus Bbootstrap 4 --> 
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
    <div class="ml-2 mt-2">
        <form action="/pertanyaan" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Answer Question</h3>
                </div>
                <p class="m-0"><span class="text-dark description">SHOW THE QUESTION HERE </span></p>
                    <div class="form-group">
                        <label for="content" class="mb-0">Your Answer</label>
                        <textarea class="textarea @error('answer') is-invalid @enderror" id="answer" name="answer" placeholder="Isi jawaban disini"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('answer') }}</textarea>
                        @error('answer')
                            <span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
        <br>
        <!-- LIST JAWABAN YANG UDAH ADA -->
        <p>Previous Answer:</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul><br>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () { 
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
        // Summernote
        $('.textarea').summernote()
        })
    </script>
@endpush