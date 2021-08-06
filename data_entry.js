function formsubmit() {
    var firstname = document.getElementById('validationCustom01')
    var lastname = document.getElementById('validationCustom02')
    var email = document.getElementById('inputGroupPrepend')
    var org = document.getElementById('validationCustom03')
    var messages = document.getElementById('exampleFormControlTextarea1')

    //store elements in a string
    var formdata = 'firstname=' + firstname + 'lastname=' + lastname + '&email' + email + '&organization' + org + '&message' + messages

    // AJAX code to submit form.
	$.ajax({
        type: "POST",
        url: "functions.php", //call functions.php to store form data
        data: formdata,
        cache: false,
        success: function(html) {
         alert(html);
        }
   });
   return false;

   }



