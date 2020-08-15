@extends('layouts.master')

@push('styles')
  <!-- Tempusdominus Bbootstrap 4 --> 
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
    <div class="ml-2 mt-2">
        <form action="{{ route('question.store') }}" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Question</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="mb-0">Title</label>
                        <p class="m-0"><span class="text-dark description">Be specific and imagine you’re asking a question to another person</span></p>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title..." value="{{  old('title') }}">
                        @error('title')
                            <span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content" class="mb-0">Body</label>
                        <p class="m-0"><span class="text-dark description">Include all the information someone would need to answer your question</span></p>
                        <textarea class="textarea mb-0 pb-0 @error('question') is-invalid @enderror" id="question" name="question" placeholder="Isi question"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('question') }}</textarea>
                        @error('question')
                            <span class="text-danger mt-0" style="font-size: 12.8px;">{{ $message }}</span><br> 
                        @enderror
                    </div>
                    <div class="form-group">
                      <label class="mb-0">Tags</label>
                      <p class="m-0"><span class="text-dark description">Add tags to describe what your question is about</span></p>
                      <select id="tags" name="tags[]" class="select2bs4 @error('tags') is-invalid @enderror" multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                        <option>Laravel</option>
                        <option>PHP</option>
                        <option>CSS</option>
                        <option>HTML</option>
                        <option>C++</option>
                        <option>MySql</option>
                        <option>MariaDB</option>
                    </select>
                    @error('tags')
                        <span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
                    @enderror 
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
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
