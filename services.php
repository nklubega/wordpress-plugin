<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type ="text/javascript">
   function addService()
   {
      var add = document.getElementById("add");
      add.submit(); 
   } 

   
   function deleteService(id)
   {
      var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
       //alert(id);
      var data = {
          action: 'shift',
          type: 'delete',
          id: id,
          table: "services"
      };

      $.post(ajaxurl, data, function(response) {
        location.reload(true);
      }); 
   }

   function updateService(id, name)
   {
      var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
      var name = document.getElementById(name).value;
 
      var data = {
          action: 'shift',
          type: 'update',
          id: id,
          name: name,
          table: "services"
      };

      $.post(ajaxurl, data, function(response) {
        location.reload(true);
      }); 
   }

</script>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Service</h4>
      </div>

      <form method="POST" id = "add">
        <div class="input">
          <div class="form-group col-md-12">
            <label>Service name</label>
            <input type="text" class="form-control" name = "name" placeholder = "shift name..">
          </div>
          <input type="hidden" name = "add" value = "add">
        </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="button" onclick ="addService()">Save</button>
        <button type="button" class="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class = "frame" style = "width : 95%; margin auto; border-radius: 20px;">
  <div class = "card-header" style = "margin-top : 20px; border-top-left-radius: 20px; border-top-right-radius: 20px;">
      <h4 style = "margin-top : 10px;"><b>Caregiver Services</b></h4>
  </div>

  <div style = "margin-left : 5px; margin-right : 5px;">
    <div class = "card-body table-responsive" style = "margin-top : 20px padding 10px;">
        <table class="table table-striped" border = "0" style = "overflow-x: hidden;">
            <tr class = "header">
                <td class = "text"><b>Id</b></td>
                <td class = "text"><b>Service</b></td>
                <td class = "text" colspan ="2"><b>Actions</b></td>
            </tr>

            <?php
            if($services){
              $i = 1;
              foreach ($services as $service) {
            ?>

                <div id="<?php echo $service->Id."delete"; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Delete Record</h4>
                      </div>
                      <div class="modal-body">
                        <p>Are sure you want to delete this record?</p>
                        <button class="button" style = "width: 100%;" onclick ="deleteService(<?php echo $service->Id; ?>)">Delete</button>
                      </div>                      
                    </div>
                  </div>
                </div>


                <div id="<?php echo $service->Id."update"; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Update Service</h4>
                      </div>

                      <form>
                        <div class="input">
                          <div class="form-group col-md-12">
                            <label>Service name</label>
                            <input type="text" id="<?php echo $service->Id."name"; ?>"  class="form-control" name = "name" placeholder = "shift name.." value ="<?php echo $service->Service; ?>" >
                          </div>
                        </div>
                      </form>
                      
                      <div class="modal-footer">
                        <button type="button" class="button" onclick ='updateService(<?php echo $service->Id; ?>, "<?php echo $service->Id."name"; ?>")'>Save</button>
                        <button type="button" class="button" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <tr>
                  <td class = "data"><?php echo $i; ?></td>
                  <td class = "data"><?php echo $service->Service; ?></td>
                  
                  <td class = "action">
                      <button type = "button" class = "btn btn-success" data-toggle = "modal" data-target = "#<?php echo $service->Id."update"; ?>" data-backdrop = "true">Update</button>
                  </td>

                  <td class = "action">
                      <button type = "button" class = "btn btn-danger" data-toggle = "modal" data-target = "#<?php echo $service->Id."delete"; ?>" data-backdrop = "true">Delete</button>
                  </td>
                </tr>
                
            <?php
                $i++;
              }
            } 
            ?>
        </table>
     </div>
  </div>
  
  <div class = "card-footer" style = "border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
      <button type = "button" style = "margin-left : 5px;" class = "button" data-toggle = "modal" data-target = "#myModal" data-backdrop = "true"><span class = "add">&plus;</span>Add Service</button>
  </div>
</div>











