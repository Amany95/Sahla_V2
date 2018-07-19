@extends('Admin.master')
@section('title','Client|Sahla')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title  back-change">
               <h5>  Online Employees </h5>
               <small>  &nbsp; &nbsp; Total ({{ $client_num }})</small> 
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
                        <div class="row employees">
                           @foreach($client as $client)
                           <div class="col-md-3">
                              <div class="thumbnail">
                                 <div class="caption">
                                    <h4>{{ $client->name }}</h4>
                                    <p> {{ $client->description }}</p>
                                 </div>
                              </div>
                              {!! Form::open(['route'=>['clients.edit',$client->id],'method'=>'GET']) !!}
                              {{ Form::submit('Edit',array('class'=>'btn btn-default')) }}
                              {!! Form::close() !!}
                              {!! Form::open(['route'=>['clients.destroy',$client->id],'method'=>'DELETE']) !!}
                              {{ Form::submit('Delete',array('class'=>'btn btn-primary')) }}
                              {!! Form::close() !!}
                           </div>
                           @endforeach
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