$(document).ready( function() {
    
    var form = document.register_form;
    var accountType;
    
    // CHANGE ACCOUNT FORM BASED ON TYPE
    // SET ACCOUNTTYPE VARIABLE
    $('#accounttype').change( function(val) {
        var val = $(this).val();
        
        if(val==='Actors' || val==='tosh-ette' || val==='tosh-hunk' ) {
            // hide 'other' field
            if($('#register_form .field.other').hasClass('active')) {
                $('#register_form .field.other').removeClass('active');
            }
            // show extended fields
            $('#register_form').addClass('extended');
            accountType = 3;
        } else if(val==='Other') {
            // hide extended fields
            if($('#register_form').hasClass('extended')) {
                $('#register_form').removeClass('extended');
            }
            // show 'other' field
            $('#register_form .field.other').addClass('active');
            accountType = 2;
        } else {
            // hide extended fields
            if($('#register_form').hasClass('extended')) {
                $('#register_form').removeClass('extended');
            }
            // hide 'other' field
            if($('#register_form .field.other').hasClass('active')) {
                $('#register_form .field.other').removeClass('active');
            }
            accountType = 1;
        }
        
    });
    
    var submitForm = function(data) {
        $.ajax({
            url: 'php/register_submit.php',
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(data) {
                if(data['status'] === 'SUCCESS') {
                    $('#register_form_wrapper').html('<h3>Registration successful!  Please check your email and confirm your account.<h3>');
                    
                } else if(data['status'] === 'ERROR_DUPLICATE') {
                    alert('The email address you provided is already registered.');
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                    
                } else {
                    alert('Unable to register. Please contact us.');
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
        
    };
    
    // POST TO AJAXCAPTCHA
    var validateCaptcha = function(str, form_data) {
        
        $.ajax({
            url: 'php/ajaxcaptcha.php',
            type: 'POST',
            data: {
              captchaVal: str
              },
            dataType: 'json',
            success: function(data) {
                if(data['status'] === 'SUCCESS') {
                    // continue to submit function
                    submitForm(form_data);
                    // console.log(form_data);
                } else if(data['status'] === 'INVALID') {
                    alert('Please enter correct verification code.');
                    $('#recaptcha_response_field2').focus();
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                    
                } else {
                    alert('Unable to verify captcha. Please contact us.');
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
        
    };
    
    
    // VALIDATE FORM
    var validateForm = function() {
        
        // unbind submit
        $('#submit').unbind('click', submitForm);
        
        // // remove all error classes
        $('.error').removeClass('error');
        $('.invalid_email').removeClass('invalid_email');
        
        var $requiredFields;
        // REQUIRED FIELDS BASED ON FORM TYPE
        if(accountType === 3) {
            $requiredFields = $('.form_long input, .form_standard input, .form_standard select');
        } else if(accountType === 2) {
            $requiredFields = $('.form_other input, .form_standard input, .form_standard select');
        } else {
            $requiredFields = $('.form_standard input, .form_standard select');
        }
        
        // CHECK FOR EMPTY FIELDS
        $requiredFields.each(function() {
            var value = $(this).val();
            
            // check for empty inputs
            if( value === '') {
                $(this).addClass('error');
            }
        });
        
        // CHECK FOR VALID EMAIL
        var emailVal = $('#email').val();
        var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailVal);
        
        if (!validEmail && emailVal != '') {
            $('#email').addClass('invalid_email');
        }
        
        // PUT FORM DATA IN AN ARRAY
        // serializeArray makes it json ready
        var values = {};
        var getValues = function() {
            // $requiredFields.each(function() {
            //     values[this.name] = $(this).val();
            // });
            values = $requiredFields.serializeArray();
        };
        
        
        // ERROR ALERTS
        if($('input, select').hasClass('error')) {
            alert('Please fill in required fields.');
            // rebind submit
            $('#submit').bind('click', submitForm);
            
        } else if($('#email').hasClass('invalid_email')){
            alert('Please provide a valid email address.');
            $('#email').focus();
            // rebind submit
            $('#submit').bind('click', submitForm);
            
        } else {
            // if no errors so far, move on
            getValues();
            recaptcha_response_field=form.recaptcha_response_field2.value;
            validateCaptcha(recaptcha_response_field, values);
        }
        
        return false;
    };
    
    
    // $('#submit').bind('click', submitForm);
    $('#submit').bind('click', validateForm);
    
});