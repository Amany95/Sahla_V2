@extends('Admin.master')
         
@section('title','Edit|Sahla')
@section('content')
           
            <div class="wrapper wrapper-content animated fadeInRight">
               
                
               
               <div class="row">
                  <div class="col-lg-12">

                     <div class="ibox float-e-margins">

                        <div class="ibox-title">

                           <h5>Message From User</h5>
                           <div class="ibox-tools">
                              <a class="collapse-link">
                              <i class="fa fa-chevron-up"></i>
                              </a>
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              <i class="fa fa-wrench"></i>
                              </a>
                             
                              <a class="close-link">
                              <i class="fa fa-times"></i>
                              </a>
                           </div>
                        </div>
                        <div class="ibox-content">
                            @foreach($msg as $msg)
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover dataTables-example" >
                                
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                      
                                       <th>E-mail</th>
                                       <th>Message</th>
                                       
                                      
                                       <td></td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                                    
                                    <tr class="gradeX">
                                       <td>{{ $msg->id }}</td>
                                       <td class="center">{{ $msg->name }}</td>
                                      
                                       <td class="center">{{ $msg->email }}</td>
                                       
                                       <td class="center">
                                         {{str_limit( $msg->msg,25,'...')}} 
                                       </td>

                                       <td class="text-center"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal{{ $msg->id }}">
                                          <span class="glyphicon glyphicon-eye-open">
                                          </button>&nbsp;&nbsp;
                                          
                                          
                                       </td>
                                    </tr>
                                   
                                    
                                   
                                    
                                    
                                 </tbody>
                                 
                              </table>
                              <!-- Modal -->

<div id="myModal{{ $msg->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message </h4>
      </div>
      <div class="modal-body">
       <!-- model  -->
       <div class=" animated fadeInRight">
            <div class="mail-box-header">
                
                <h2>
                    View Message
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">


                  
                    <h5>
                        <span class="pull-right font-noraml">{{ $msg->updated_at }}ا</span>
                        <span class="font-noraml">From:{{ $msg->email }}</span>
                    </h5>
                </div>
            </div>
                <div class="mail-box">


                <div class="mail-body">
                    <p>
                        Hello, {{ $msg->name  }} !
                        <br>
                        <br>
                       {{ $msg->msg }}
                      
                        </p>
                    
                </div>
                    
                        
                       


                </div>
            </div>
       <!--  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                    
                    
                  </div>
               </div>
            </div>
           @endsection

               @section('javascript')
      <script>
         $(document).ready(function(){
         /**/
         
         /*end upload*/
         $('.dataTables-example').DataTable({
         pageLength: 10,
         responsive: true,
         dom: '<"html5buttons"B>lTfgitp',
         buttons: [
         { extend: 'copy'},
         {extend: 'csv'},
         {extend: 'excel', title: 'ExampleFile'},
         {extend: 'pdf', title: 'ExampleFile'},
         
         {extend: 'print',
         customize: function (win){
         $(win.document.body).addClass('white-bg');
         $(win.document.body).css('font-size', '10px');
         
         $(win.document.body).find('table')
         .addClass('compact')
         .css('font-size', 'inherit');
         }
         }
         ]
         
         });
         
         $('.tagsinput').tagsinput({
         tagClass: 'label label-primary'
         });
         
         var $image = $(".image-crop > img")
         $($image).cropper({
         aspectRatio: 1.618,
         preview: ".img-preview",
         done: function(data) {
         // Output the result data for cropping image.
         }
         });
         
         var $inputImage = $("#inputImage");
         if (window.FileReader) {
         $inputImage.change(function() {
         var fileReader = new FileReader(),
         files = this.files,
         file;
         
         if (!files.length) {
         return;
         }
         
         file = files[0];
         
         if (/^image\/\w+$/.test(file.type)) {
         fileReader.readAsDataURL(file);
         fileReader.onload = function () {
         $inputImage.val("");
         $image.cropper("reset", true).cropper("replace", this.result);
         };
         } else {
         showMessage("Please choose an image file.");
         }
         });
         } else {
         $inputImage.addClass("hide");
         }
         
         $("#download").click(function() {
         window.open($image.cropper("getDataURL"));
         });
         
         $("#zoomIn").click(function() {
         $image.cropper("zoom", 0.1);
         });
         
         $("#zoomOut").click(function() {
         $image.cropper("zoom", -0.1);
         });
         
         $("#rotateLeft").click(function() {
         $image.cropper("rotate", 45);
         });
         
         $("#rotateRight").click(function() {
         $image.cropper("rotate", -45);
         });
         
         $("#setDrag").click(function() {
         $image.cropper("setDragMode", "crop");
         });
         
         $('#data_1 .input-group.date').datepicker({
         todayBtn: "linked",
         keyboardNavigation: false,
         forceParse: false,
         calendarWeeks: true,
         autoclose: true
         });
         
         $('#data_2 .input-group.date').datepicker({
         startView: 1,
         todayBtn: "linked",
         keyboardNavigation: false,
         forceParse: false,
         autoclose: true,
         format: "dd/mm/yyyy"
         });
         
         $('#data_3 .input-group.date').datepicker({
         startView: 2,
         todayBtn: "linked",
         keyboardNavigation: false,
         forceParse: false,
         autoclose: true
         });
         
         $('#data_4 .input-group.date').datepicker({
         minViewMode: 1,
         keyboardNavigation: false,
         forceParse: false,
         autoclose: true,
         todayHighlight: true
         });
         
         $('#data_5 .input-daterange').datepicker({
         keyboardNavigation: false,
         forceParse: false,
         autoclose: true
         });
         
         var elem = document.querySelector('.js-switch');
         var switchery = new Switchery(elem, { color: '#1AB394' });
         
         var elem_2 = document.querySelector('.js-switch_2');
         var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
         
         var elem_3 = document.querySelector('.js-switch_3');
         var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });
         
         $('.i-checks').iCheck({
         checkboxClass: 'icheckbox_square-green',
         radioClass: 'iradio_square-green'
         });
         
         $('.demo1').colorpicker();
         
         var divStyle = $('.back-change')[0].style;
         $('#demo_apidemo').colorpicker({
         color: divStyle.backgroundColor
         }).on('changeColor', function(ev) {
         divStyle.backgroundColor = ev.color.toHex();
         });
         
         $('.clockpicker').clockpicker();
         
         $('input[name="daterange"]').daterangepicker();
         
         $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
         
         $('#reportrange').daterangepicker({
         format: 'MM/DD/YYYY',
         startDate: moment().subtract(29, 'days'),
         endDate: moment(),
         minDate: '01/01/2012',
         maxDate: '12/31/2015',
         dateLimit: { days: 60 },
         showDropdowns: true,
         showWeekNumbers: true,
         timePicker: false,
         timePickerIncrement: 1,
         timePicker12Hour: true,
         ranges: {
         'Today': [moment(), moment()],
         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
         'This Month': [moment().startOf('month'), moment().endOf('month')],
         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         },
         opens: 'right',
         drops: 'down',
         buttonClasses: ['btn', 'btn-sm'],
         applyClass: 'btn-primary',
         cancelClass: 'btn-default',
         separator: ' to ',
         locale: {
         applyLabel: 'Submit',
         cancelLabel: 'Cancel',
         fromLabel: 'From',
         toLabel: 'To',
         customRangeLabel: 'Custom',
         daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
         monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
         firstDay: 1
         }
         }, function(start, end, label) {
         console.log(start.toISOString(), end.toISOString(), label);
         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         });
         
         $(".select2_demo_1").select2();
         $(".select2_demo_2").select2();
         $(".select2_demo_3").select2({
         placeholder: "Select a state",
         allowClear: true
         });
         
         
         $(".touchspin1").TouchSpin({
         buttondown_class: 'btn btn-white',
         buttonup_class: 'btn btn-white'
         });
         
         $(".touchspin2").TouchSpin({
         min: 0,
         max: 100,
         step: 0.1,
         decimals: 2,
         boostat: 5,
         maxboostedstep: 10,
         postfix: '%',
         buttondown_class: 'btn btn-white',
         buttonup_class: 'btn btn-white'
         });
         
         $(".touchspin3").TouchSpin({
         verticalbuttons: true,
         buttondown_class: 'btn btn-white',
         buttonup_class: 'btn btn-white'
         });
         
         $('.dual_select').bootstrapDualListbox({
         selectorMinimalHeight: 160
         });
         
         
         });
         
         $('.chosen-select').chosen({width: "100%"});
         
         $("#ionrange_1").ionRangeSlider({
         min: 0,
         max: 5000,
         type: 'double',
         prefix: "$",
         maxPostfix: "+",
         prettify: false,
         hasGrid: true
         });
         
         $("#ionrange_2").ionRangeSlider({
         min: 0,
         max: 10,
         type: 'single',
         step: 0.1,
         postfix: " carats",
         prettify: false,
         hasGrid: true
         });
         
         $("#ionrange_3").ionRangeSlider({
         min: -50,
         max: 50,
         from: 0,
         postfix: "°",
         prettify: false,
         hasGrid: true
         });
         
         $("#ionrange_4").ionRangeSlider({
         values: [
         "January", "February", "March",
         "April", "May", "June",
         "July", "August", "September",
         "October", "November", "December"
         ],
         type: 'single',
         hasGrid: true
         });
         
         $("#ionrange_5").ionRangeSlider({
         min: 10000,
         max: 100000,
         step: 100,
         postfix: " km",
         from: 55000,
         hideMinMax: true,
         hideFromTo: false
         });
         
         $(".dial").knob();
         
         var basic_slider = document.getElementById('basic_slider');
         
         noUiSlider.create(basic_slider, {
         start: 40,
         behaviour: 'tap',
         connect: 'upper',
         range: {
         'min':  20,
         'max':  80
         }
         });
         
         var range_slider = document.getElementById('range_slider');
         
         noUiSlider.create(range_slider, {
         start: [ 40, 60 ],
         behaviour: 'drag',
         connect: true,
         range: {
         'min':  20,
         'max':  80
         }
         });
         
         var drag_fixed = document.getElementById('drag-fixed');
         
         noUiSlider.create(drag_fixed, {
         start: [ 40, 60 ],
         behaviour: 'drag-fixed',
         connect: true,
         range: {
         'min':  20,
         'max':  80
         }
         
         });
         
      </script>
@endsection