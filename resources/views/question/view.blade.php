@extends('layouts.app')
@section('css')
<style>

   
    </style>

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                   @foreach($question as $questions)
                   <div class="media">
                   <div class="d-flex flex-column counters">
                   <div class="vote">
                        <strong>{{$questions->votes}}</strong>{{str_plural('vote',$questions->votes)}}
                       </div>
                   
                   <div class="status {{$questions->status}}">
                        <strong>{{$questions->answers}}</strong>{{str_plural('answer',$questions->answers)}}
                       </div>
                   
                   <div class="views">
                        {{$questions->views."".str_plural('view',$questions->views)}}
                       </div>
                   </div>
                    <div class="media-body">
                    <h3 class="mt-0"><a href="{{$questions->url}}">{{$questions->title}}</a></h3>
                    <p class="lead">Asked By <a href="{{$questions->user->url}}">{{$questions->user->name}}</a></p>
                    <small class="text-muted">{{$questions->created_date}}</small>
                      {{str_limit($questions->body,250)}}
                      
                    </div>
                   </div>
                   @endforeach
                   {{$question->links()}}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
