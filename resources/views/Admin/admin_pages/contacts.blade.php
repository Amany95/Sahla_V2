@extends('Admin.master')
@section('title','Edit|Sahla')



@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title  back-change">
               <h5>Contact us</h5>
            </div>
            <div class="ibox-content">
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="close-link">
                  <i class="fa fa-times"></i>
                  </a>
               </div>
               <div class="ibox-content">
                  {!! Form::open(['route'=>['admin.contact'],'method'=>'POST','class'=>'form-horizontal']) !!}
                  <div class="form-group">
                     {!! Form::label('address','Address',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                        {!! Form::text('address',null,array('required'=>'required',  'class'=>'form-control','id'=>'address')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('email','Email',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                        {!! Form::text('email',null,array('required'=>'required',  'class'=>'form-control','id'=>'email')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('phone','phone',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10"> 
                        {!! Form::text('phone',null,array('required'=>'required',  'class'=>'form-control','data-mask'=>'(999) 999-99999','id'=>'phone')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('facebok','facebook',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                        {!! Form::text('facebook',null,array('required'=>'required',  'class'=>'form-control','id'=>'facebok')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('twitter','twitter',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10"> 
                        {!! Form::text('twitter',null,array('required'=>'required',  'class'=>'form-control','id'=>'twitter')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('youtube','youtube',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                        {!! Form::text('youtube',null,array('required'=>'required',  'class'=>'form-control','id'=>'youtube')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('instagram','instagram',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                        {!! Form::text('instagram',null,array('required'=>'required',  'class'=>'form-control','id'=>'instagram')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     {!! Form::label('description','Description',array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                        {!! Form::textarea('description',null,array('required'=>'required',  'class'=>'form-control','rows'=>5,'id'=>'description')) !!}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-offset-2 col-lg-10">
                        {!! Form::submit('Save change',array('class'=>'btn btn-primary pull-right','id'=>'javasubmit')) !!}
                     </div>
                  </div>
                  {!! Form::close() !!}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection


@section('javascript')
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
         jQuery(document).ready(function(){
            jQuery('#javasubmit').click(function(e){

               alert($('#facebok').val());
                e.preventDefault();
                $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }
               });
                jQuery.ajax({
                   datatype:'ajax',
                   url: '{{ route('admin.contact') }}',
                   method: 'POST',
                   data: {
                      address: $('#address').val(),
                      email: $('#email').val(),
                     

                      facebok: $('#facebok').val(),
                      twitter: $('#twitter').val(),
                      youtube: $('#youtube').val(),
                      instagram: $('#instagram').val(),
                      description: $('#description').val()
                   },
                   success: function(result){

                     console.log(result);
                      jQuery('.alert').show();
                      jQuery('.alert').html(result.success);
                   }});
               });
            });
</script>
@endsection