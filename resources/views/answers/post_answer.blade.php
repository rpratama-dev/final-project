<div class="post clearfix"> 
  <div class="card-header p-2 mb-2"> 
    <h5 class="card-title ml-2">Your Answers</h5> 
  </div> 
  <form action="#" method="post" accept-charset="utf-8">
    <div class="form-group"> 
      <textarea class="textarea mt-3 @error('answer') is-invalid @enderror" id="answer" name="answer" placeholder="Isi answer"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('answer') }}</textarea>
      @error('answer')
        <span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
      @enderror
    </div>

    <p class="mb-0">
      <button class="btn btn-primary" type="submit">Post Your Answer</button>
    </p>  
  </form>  
</div>