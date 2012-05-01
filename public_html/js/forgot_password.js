$(document).ready( function() {

    var submitForm = function() {
        var email = $('form #email');
        var emailVal = email.val();
    
        // unbind to prevent multiple submits
        $('#submit').unbind('click', submitForm);
    
        if(emailVal === '') {
            $('#msg').addClass('active')
                .html('Please enter your email address.');
            email.focus();
            // rebind
            $('#submit').bind('click', submitForm);
            return false;
        }
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val()))) {
            $('#msg').addClass('active')
                .html('Please enter a proper email address.');
            email.focus();
            // rebind
            $('#submit').bind('click', submitForm);
            return false;
        }
    
        $.ajax({
            url: 'php/ajax_forgot.php',
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
    
    // BIND ENTER
    // submits form when pressing 'Enter'
    var submitKeydown = function(e) {
        
        var keyPressed = e.keyCode;
        
        if( keyPressed === 13 ){
            
            $('#submit').click();
            return false;
        }
        
    };
    
    $('form input').bind('keydown', submitKeydown);
    $('#submit').bind('click', submitForm);
});