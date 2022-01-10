@extends('layouts.default')

@section('title')
Update Department
@endsection('title')
@section('content')
<script src="{!! asset('jquery-3.4.1.js') !!}"></script> 

<!-- <link href="{!! asset('bootstrap.min.css') !!}" rel="stylesheet"> -->

<link  href="{!! asset('jquery.dataTables.min.css') !!}" rel="stylesheet">

<script src="{!! asset('jquery.dataTables.min.js') !!}"></script>

<script src="{!! asset('jquery.validate.js') !!}"></script>

<script src="{!! asset('bootstrap.min.js') !!}"></script>

 <div class="container mt-4">
 <div class="row">
            		<div class="col-md-12">
            			<div class="dt-buttons">
            				<a class="dt-button buttons-print btn dark btn-outline" style="background: #123806;" tabindex="0" aria-controls="sample_1" href="{{route('printAll')}}">
            					<span><i class="fa fa-print"></i> Print General List </span>
            				</a>
            			</div>
            		</div>
            	</div><br>
    <table class="table table-bordered" id="members_table">
           <thead>
            <tr>
                     <th>Id</th>
                     <th>Department</th>
                     <th>Department Code</th>
                     <th>Action</th>  
            </tr>
           </thead>
       </table>
   </div>


<!-- delete confirmation modal -->
<!-- <div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h5 align="center" style="margin:0;">Are you sure you want to delete this Precint?</h5>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div> -->
<script>
$(document).ready(function(){

 $('#members_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ URL::to('/printList') }}",
  },
  columns:[
   {
    data: 'id',
    name: 'id'
   },
   {
    data: 'dept',
    name: 'dept'
   },
   {
    data: 'dept_code',
    name: 'dept_code'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 // var user_id;

 // $(document).on('click', '.delete', function(){
 //  user_id = $(this).attr('id');
 //  $('#confirmModal').modal('show');
 // });

 // $('#ok_button').click(function(){
 //  $.ajax({
 //   url:"home/updateMembers/destroy/"+user_id,
 //   beforeSend:function(){
 //    $('#ok_button').text('Deleting...');
 //   },
 //   success:function(data)
 //   {
 //    setTimeout(function(){
 //     $('#confirmModal').modal('hide');
 //     $('#user_table').DataTable().ajax.reload();
 //    }, 2000);
 //   }
 //  })
 // });

});
</script>
 @endsection('content')