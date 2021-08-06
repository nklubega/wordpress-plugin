<!--Registration form in php format-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>        <title>Registration Page</title>
     
<script type="text/javascript"> 
    jQuery(document).ready(function($) {
        $("#signupForm").validate(
            {
            rules:
            {
                firstname: {required:true},
                lastname: {required:true},
                email: {required:true, email:true},
                org: {required:true},
                preference: {required:true},
                password: {required:true}
                

            },
            submitHandler: function(form){
                var form_data = $("form#signupForm").serialize();
                $.ajax(
                    {
                        type: "POST",
                        url: "/wp-admin/admin-ajax.php",
                        data: form_data,
                        success: function(responseData){
                            if( responseData == 1 ) {
                                location.reload();
                            }
                            else {
                                jQuery(".error-msg").html(responseData);
                            }
                        }
                    });
                    return false;
            }
            });
        });
        function addDetails(){
            var add = document.getElementById("add")
            add.submit();
        }
</script>
        <p class="h1">Partner with us</p>
       
<form class="needs-validation" id="signupForm" novalidate enctype="multipart/form-data" method="POST" action=" <?php echo admin_url('admin-ajax.php'); ?>">
    <div class="col">
      <div class="col-md-4 mb-3">
        <label for="validationCustom01">First name</label>
        <input type="text" class="form-control" id="validationCustom01" name="firstname" placeholder="First name" value="" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationCustom02">Last name</label>
        <input type="text" class="form-control" id="validationCustom02" name="secondname" placeholder="Last name" value="" required>
        <div class="valid-feedback">
        </div>
        
      </div>
      
      <div class="col-md-4 mb-3">
        <label for="validationCustomEmail">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
          <input type="text" class="form-control" id="validationCustomEmail" name="email" placeholder="Username" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
          </div>
        </div>
      </div>
      <label for="inputPassword5">Password</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password">
        <small id="passwordHelpBlock" class="form-text text-muted">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
    </div>
    <div class="col">
      <div class="col-md-6 mb-3">
        <label for="validationCustom03">Organisation</label>
        <input type="text" class="form-control" id="validationCustom03" name="org" placeholder="organisation" required>
        <div class="invalid-feedback">
        </div>
      </div>
      
    </div>
    <div class="col">
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlTextarea1">Additional information</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="preference" rows="3"></textarea>
      </div>
      </div>
    <div class="col">
        <div class="col-md-6 mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          Agree to terms and conditions
        </label>
        <div class="invalid-feedback">
        </div>
      </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
    <button class="btn btn-primary" type="submit" id="add" onclick='submitform()'>Submit</button>
    </div>
    
  </form>
  
  
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
-->