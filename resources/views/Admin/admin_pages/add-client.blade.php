@extends('Admin.master')
@section('title','Add Client|Sahla')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title  back-change">
               <h5>  Add Employee </h5>
               <small>  &nbsp; &nbsp; number ({{ $client_num }})</small> 
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
                           {!! Form::open(['route' => ['clients.store'],'method'=>'POST']) !!}
                           <div class="col-md-7">
                              {{ Form::label('client_name','Client name',array('id'=>'','class'=>'')) }}
                              <div class="form-group {{ $errors->has('client_name')? 'has-error' : '' }} ">
                                 {{ Form::text('client_name',null,array('class'=>'form-control')) }}
                                 @if($errors->has('client_name'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('client_name') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group {{ $errors->has('description')? 'has-error' : '' }}">
                                 {{ Form::label('description','Description',array('id'=>'','class'=>'')) }}
                                 {{ Form::textarea('description','This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out...',array('id'=>'','class'=>'resizable_textarea form-control' ,'rows' => 8)) }}
                                 @if($errors->has('description'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('description') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="x_content text-right">
                                 {{ Form::submit('Save',array('id'=>'','class'=>'btn btn-primary')) }}
                                 {!! Form::open(['route'=>['clients.create'],'method'=>'GET']) !!}
                                 {{ Form::submit('Cancel',array('id'=>'','class'=>'btn btn-red')) }}
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