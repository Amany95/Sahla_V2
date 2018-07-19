@extends('Admin.master')
@section('title','Edit|Sahla')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title  back-change">
               <h5>  download Mobile App </h5>
               <small>  &nbsp; &nbsp;   Ios</small> 
            </div>
            <div class="ibox-content">
               <div class="ibox-content">
                  <div class="x_panel">
                     <div class="x_content">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="x_content">
                                 <div class="wrap">
                                    <h4>Shoot screen  Image From app</h4>
                                    <div class="upload-thumb thumbnail"> <img id="img" src="/images/{{ $ios->img }}" style="max-width: 147px;" alt="" /></div>
                                    {!! Form::open(['route'=>['admin.ios'],'method'=>'PUT','files' => true]) !!}
                                    <div class="form-group    {{  $errors->has('img')?'has-error':''}}">
                                    </div>
                                    {!! Form::file('img') !!}
                                    @if($errors->has('img'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group {{ $errors->has('ios_header')?'has-error':''  }}">
                                 {!! Form::label('ios_header','Header') !!}   
                                 {!! Form::text('ios_header',null,array('class'=>'form-control','required' => 'required')) !!}                              
                                 @if($errors->has('ios_header'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('ios_header') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group {{ $errors->has('ios_description')?'has-error':''  }}">
                                 {!! Form::label('ios_description','Description') !!}   
                                 {!! Form::textarea('ios_description','This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out...',array('class'=>'resizable_textarea form-control','rows'=>8,'required' => 'required')) !!}
                                 @if($errors->has('ios_description'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('ios_description') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group {{$errors->has('ios_video')?'has-error':''  }}">
                                 {!! Form::label('ios_video','Video URL') !!}   
                                 {!! Form::text('ios_video',null,array('class'=>'form-control','required' => 'required')) !!} 
                                 @if($errors->has('ios_video'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('ios_video') }}</strong>
                                 </span>
                                 @endif                              
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="x_content text-right">
                                 {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}     
                                 {!! Form::close() !!}
                                 <a href="/admin/ios" class="btn btn-red">Cancel</a>
                              </div>
                           </div>
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