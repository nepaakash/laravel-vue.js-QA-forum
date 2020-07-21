@extends('layouts.app')
@section('css')



    

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>All Questions</h2>
                    <div class="ml-auto">
                        <a href="{{route('CreateQuestions')}}" class="btn btn-outline-secondary">Ask Questions</a>
                    </div>
                    </div>
                </div>
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
                    <div class="d-flex align-items-center">
                    <h3 class="mt-0"><a href="{{$questions->url}}">{{$questions->title}}</a></h3>
                    <div class=ml-auto>
                    <a href="{{route('EditQuestions',$questions->id)}}" class="btn btn-sm btn-outline-info">Edit </a>
                    <form style="display:inline;" action="{{route('DeleteQuestions',$questions->id)}}" method="post">

                    @csrf
                    <a href="javascript:" onclick="ram()"  rel="{{$questions->id}}" rel1="delete-question" class="deleteRecord btn btn-sm btn-outline-info ">Delete </a>
                    </form>
                    
                    </div>
                    </div>
                   
                    
                    
                     
                    
                    <p class="lead">Asked By <a href="{{$questions->user->url}}">{{$questions->user->name}}</a>
                    <small class="text-muted">{{$questions->created_date}}</small></p>
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
@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
        @if(session('flash_message'))
        swal("Success!", "{!! session('flash_message') !!}", "success")
        @endif

    </script>

<script>
     $('.deleteRecord').click(function () {
         
       
    });

    function ram(){
        var id = $('.deleteRecord').attr('rel');
       

            swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this question!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
           
    $.ajax({
  type: "POST",
  url: 'delete-question' + "/" + id,
  data: {
        "_token": "{{ csrf_token() }}"
        
        },

        success:function(){
            window.location.reload();
            swal("Question deleted Successfully", {
      icon: "success",
      button: false,
    });}
        
});


   
  } else {
    swal("Your imaginary file is safe!");
  }
});
    }
    </script>

@endsection