$(document).ready( function() {

    var submitSelection = function() {
        // var email = $('form #email');
        // var emailVal = email.val();
        
        console.log($(this));
        
        // unbind to prevent multiple submits
        $('#submit').unbind('click', submitForm);
        
        $.ajax({
            url: 'php/audition_select.php',
            type: "POST",
            data: {
              email: emailVal
            },
            dataType: 'json',
            success: function(data) {
                if(data['status'] === 'NOT_FOUND') {
                    $('#msg').addClass('active')
                        .html('Sorry, we can\'t find that email in our records.');
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                
                } else if(data['status'] === 'SUCCESS') {
                    // send to account page
                    $('#msg').addClass('active')
                        .html('Your password has been emailed to ' + emailVal + ".");
                
                } else {
                    $('#msg').addClass('active')
                        .html('Unknown error. Please contact us.');
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  alert(xhr.statusText);
                  alert(xhr.responseText);
                  alert(xhr.status);
                  alert(thrownError);
              }
        });
        
        return false;
    };
    
    function valid()
    {
        form=document.frmselect;
        // document.frmselect.HidRegUser.value='1';
        document.frmselect.submit();
        return  true;
    }
    
    // $('.select_audition').bind('click', submitSelection);
});