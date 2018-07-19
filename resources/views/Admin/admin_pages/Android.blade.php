@extends('Admin.master')
@section('title','Edit|Sahla')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title  back-change">
               <h5>  download Mobile App </h5>
               <small>  &nbsp; &nbsp;   Android</small> 
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
                                    <div class="upload-thumb thumbnail {{ $errors->has('img')?'has-error':'' }}"> <img id="img" src="/images/{{$android['img']}}" style="max-width: 147px;" alt="" /></div>
                                    {!! Form::open(['route'=>['admin.android'],'method'=>'PUT','files'=>true]) !!}
                                    {!! Form::file('img',array('class'=>'image')) !!}
                                    @if($errors->has('img'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group {{ $errors->has('android_header')?'has-error' : '' }}">
                                 {!! Form::label('android_header','Header') !!}
                                 {!! Form::text('android_header',null,array('class'=>'form-control','required'=>'required')) !!}
                                 @if($errors->has('android_header'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('android_header') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group {{ $errors->has('android_description')?'has-error':''  }}">
                                 {!! Form::label('android_description','Description') !!}
                                 {!! Form::textarea('android_description','This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out...',array('class'=>'resizable_textarea form-control','required'=>'required','rows'=>8)) !!}
                                 @if($errors->has('android_description'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('android_description') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group {{$errors->has('android_video')?'has-error':''  }}">
                                 {!! Form::label('android_video','Video URL') !!}
                                 {!! Form::text('android_video',null,array('class'=>'form-control','required'=>'required')) !!}
                                 @if($errors->has('android_video'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('android_video') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="x_content text-right">
                                 {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}
                                 <a href="{{ route('admin.android') }}" class="btn btn-red">Cancel</a>
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
   </div>
</div>
@endsection