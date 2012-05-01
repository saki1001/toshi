$(document).ready( function() {            
    
    var submitForm = function() {
        var email = $('form #email');
        var password = $('form #password');
        var emailVal = email.val();
        var passwordVal = password.val();
        
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
        if(passwordVal === '') {
            $('#msg').addClass('active')
                .html("Please enter your password.");
            password.focus();
            // rebind
            $('#submit').bind('click', submitForm);
            return false;
        }
        
        $.ajax({
            url: 'php/login_submit.php',
            type: "POST",
            data: {
              email: emailVal,
              password: passwordVal
              },
            dataType: 'json',
            success: function(data) {
                if(data['status'] === 'ERROR_INVALID') {
                    $('#msg').addClass('active')
                        .html('Invalid email or password.');
                        console.log('invalid');
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                    
                } else if(data['status'] === 'ERROR_CONFIRM') {
                    $('#msg').addClass('active')
                        .html('Please check your email and confirm your account.');
                        console.log('unconfirmed');
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                        
                } else if(data['status'] === 'SUCCESS') {
                    // send to account page
                    document.location = 'my_account.php';
                    
                } else {
                    $('#msg').addClass('active')
                        .html('Unable to sign in. Please contact us.');
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