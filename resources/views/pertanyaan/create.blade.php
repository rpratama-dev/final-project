@extends('layouts.master')

@section('content')
    <div class="ml-2 mt-2">
        <form action="/pertanyaan" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Buat Pertanyaan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{ old('title', '') }}" id="title"
                            placeholder="Enter Title" name="title">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Body</label>
                        <textarea type="content" class="form-control" value="{{ old('content', '') }}" id="content"
                            placeholder="Enter Content" name="content" rows="3"></textarea>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Tags</label>
                        <input type="text" class="form-control" value="{{ old('tag', '') }}" id="tag"
                            placeholder="Example (PHP,SQL,JAVASCRIPT)" name="tag">
                        @error('tag')
                        <div class="alert alert-danger">{{ $message }}</div>
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
