@extends('Admin.master')
@section('title','Edit|Sahla')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title  back-change">
               <h5>  Edit Employee </h5>
               <small>  &nbsp; &nbsp; 
               </small> 
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
                  <div class="x_panel">
                     <div class="x_content">
                        <div class="row">
                           {!! Form::open(['route'=>['clients.update',$client['id']],'method'=>'PUT'])!!}
                           <div class="col-md-7">
                              <div class="form-group">
                                 {!! Form::label('edit_name','Client Name') !!}
                                 {!! Form::text('edit_name',$client['name'],array('class'=>'form-control')) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::label('edit_descrip','Description') !!}
                                 {!! Form::textarea('edit_descrip',$client['name'],array('class'=>'resizable_textarea form-control','rows'=>8)) !!}
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="x_content text-right">
                                 {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}
                                 {!! Form::open(['route'=>['clients.index'],'method'=>'GET'])!!}
                                 {!! Form::submit('Cancel',array('class'=>'btn btn-red')) !!}
                                 {!! Form::close() !!}
                              </div>
                           </div>
                           {!! Form::close() !!}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection