@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>Update Question</h2>
                    <div class="ml-auto">
                        <a href="{{route('ViewQuestions')}}" class="btn btn-outline-secondary">Back to all questions</a>
                    </div>
                    </div>
</div>

                <div class="card-body">
                  <form action="{{route('EditQuestions',$question->id)}}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label for="qtitle">Question Title</label>
                          <input type="text" value="{{old('title',$question->title)}}" name="title" id="qtitle" class="form-control {{$errors->has('title') ? 'is-invalid':''}}">
                          @if($errors->has('title'))
                          <div class="invalid-feedback">
                              <strong>{{$errors->first('title')}}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="body">Explain your Question</label>
                          <textarea name="body" id="qbody" class="form-control {{$errors->has('body') ? 'is-invalid' :''}}" row="10">{{old('body',$question->body)}}</textarea>
                          @if($errors->has('body'))
                          <div class="invalid-feedback">
                              <strong>{{$errors->first('body')}}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Update this question</button>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
