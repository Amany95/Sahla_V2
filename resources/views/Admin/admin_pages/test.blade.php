@extends('Admin.master')
@section('title','Edit|Sahla')

@section('stylesheet')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@endsection


@section('content')



                        <form class="form-horizontal" method="POST"  enctype="multipart/form-data"  id="fileform="{{ route('admin.test') }}">
                              {{ csrf_field() }}
                               
                                <div class="form-group">
                                  <label class="col-md-2 control-label" for="file">Address</label>

                                    <div class="col-md-10">
                                      <input type="file" required="" id="file" name="file" placeholder="" class="form-control"> 
                                    </div>
                                </div>
                               


                                 <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                       <button class="btn btn-primary pull-right" id="button_sub" name="save_contact" type="submit">Save changes</button>
                                    </div>
                                </div>

                            </form>



@endsection


@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
        $(document).ready(function (e) {
  
  $(".fileform").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      url: "{{ route('admin.test') }}",        // Url to which the request is send
      type: "POST",             // Type of request to be send, called as method
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cached
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data)   // A function to be called if request succeeds
      {
        $(".upload-msg").html(data);
      }
    });
  }
))});
</script>

 
@endsection