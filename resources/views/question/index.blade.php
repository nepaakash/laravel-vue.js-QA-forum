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
                    <h1>{{$question->title}}</h1>
                    <div class="ml-auto">
                        <a href="{{route('ViewQuestions')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                  {!!$question->body_html!!}
                    
                     
                    
  
                    
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