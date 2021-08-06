<!--
//index.php
!-->

<html>  
    <head>  
        <title>PHP - Sending multiple forms data through jQuery Ajax</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Services</a></h3><br />
   <br />
   <br />
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
   </div>
   <br />
   <form method="post" id="user_form">
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="user_data">
      <tr>
       <th>Service Name</th>
       <th>Description</th>
      </tr>
     </table>
    </div>
    <div align="center">
     <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
    </div>
   </form>

   <br />
  </div>
  <div id="user_dialog" title="Add Data">
   <div class="form-group">
    <label>Enter Service Name</label>
    <input type="text" name="service_name" id="service_name" class="form-control" />
    <span id="error_service_name" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Enter Service Description</label>
    <input type="text" name="Descrition" id="Descrition" class="form-control" />
    <span id="error_Descrition" class="text-danger"></span>
   </div>
   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">

  </div>
    </body>  
</html> 

<script>  
$(document).ready(function(){ 
 
 var count = 0;

 $('#user_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#user_dialog').dialog('option', 'title', 'Add Data');
  $('#service_name').val('');
  $('#Descrition').val('');
  $('#error_service_name').text('');
  $('#error_Descrition').text('');
  $('#service_name').css('border-color', '');
  $('#Descrition').css('border-color', '');
  $('#save').text('Save');
  $('#user_dialog').dialog('open');
 });

 $('#save').click(function(){
  var error_service_name = '';
  var error_Descrition = '';
  var service_name = '';
  var Descrition = '';
  if($('#service_name').val() == '')
  {
   error_service_name = 'Service Name is required';
   $('#error_service_name').text(error_service_name);
   $('#service_name').css('border-color', '#cc0000');
   service_name = '';
  }
  else
  {
   error_service_name = '';
   $('#error_service_name').text(error_service_name);
   $('#service_name').css('border-color', '');
   service_name = $('#service_name').val();
  } 
  if($('#Descrition').val() == '')
  {
   error_Descrition = 'Description is required';
   $('#error_Descrition').text(error_Descrition);
   $('#Descrition').css('border-color', '#cc0000');
   Descrition = '';
  }
  else
  {
   error_Descrition = '';
   $('#error_Descrition').text(error_Descrition);
   $('#Descrition').css('border-color', '');
   Descrition = $('#Descrition').val();
  }
  if(error_service_name != '' || error_Descrition != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+service_name+' <input type="hidden" name="hidden_service_name[]" id="service_name'+count+'" class="service_name" value="'+service_name+'" /></td>';
    output += '<td>'+Descrition+' <input type="hidden" name="hidden_Descrition[]" id="Descrition'+count+'" value="'+Descrition+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#user_data').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+service_name+' <input type="hidden" name="hidden_service_name[]" id="service_name'+row_id+'" class="service_name" value="'+service_name+'" /></td>';
    output += '<td>'+Descrition+' <input type="hidden" name="hidden_Descrition[]" id="Descrition'+row_id+'" value="'+Descrition+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#user_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var service_name = $('#service_name'+row_id+'').val();
  var Descrition = $('#Descrition'+row_id+'').val();
  $('#service_name').val(service_name);
  $('#Descrition').val(Descrition);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#user_dialog').dialog('option', 'title', 'Edit Data');
  $('#user_dialog').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

 $('#user_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.service_name').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#user_data').find("tr:gt(0)").remove();
     $('#action_alert').html('<p>Data Inserted Successfully</p>');
     $('#action_alert').dialog('open');
    }
   })
  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });
 
});  
</script>
