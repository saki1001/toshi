$(document).ready( function() {
    
    var form = document.register_form;
    var accountType;
    
    // CHANGE ACCOUNT FORM BASED ON TYPE
    // SET ACCOUNTTYPE VARIABLE
    $('#accounttype').change( function(val) {
        var val = $(this).val();
        
        if(val==='Actors' || val==='tosh-ette' || val==='tosh-hunk' ) {
            // show extended fields
            $('#register_form').addClass('extended');
            accountType = 3;
        } else if(val==='Other') {
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
            url: 'php/login_submit.php',
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(data) {
                if(data['status'] === 'ERROR_INVALID') {
                    $('#msg').addClass('active')
                        .html('Invalid email or password.');
                    // rebind submit
                    $('#submit').bind('click', submitForm);
                    
                } else if(data['status'] === 'ERROR_CONFIRM') {
                    $('#msg').addClass('active')
                        .html('Please check your email and confirm your account.');
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
        
    };
    
    // // SEND POST DATA
    // var http_request = false;
    // var makePOSTRequest2 = function(url, parameters) {
    //   http_request = false;
    //   
    //   var alertContents2 = function() {
    //     if (http_request.readyState == 4) 
    //     {
    //           var result = http_request.responseText;    
    //           result=trim(result);
    //           if (result!='')
    //           {    
    //               alert("Please enter correct verification code.");                        
    //               form.recaptcha_response_field2.focus();    
    //               return false;
    //           }
    //           else if (result=='')
    //           {            
    //               form.HidRegUser.value='1';
    //               form.submit();
    //               return  true;
    //           }
    //     }
    //   };
    //   
    //   var trim = function(stringToTrim) {
    //       return stringToTrim.replace(/^\s+|\s+$/g,"");
    //   };
    //   
    //   
    //   if (window.XMLHttpRequest) { // Mozilla, Safari,...
    //      http_request = new XMLHttpRequest();
    //      if (http_request.overrideMimeType) {             
    //         http_request.overrideMimeType('text/html');
    //      }
    //   } else if (window.ActiveXObject) { // IE
    //      try {
    //         http_request = new ActiveXObject("Msxml2.XMLHTTP");
    //      } catch (e) {
    //         try {
    //            http_request = new ActiveXObject("Microsoft.XMLHTTP");
    //         } catch (e) {}
    //      }
    //   }
    //   if (!http_request) {
    //      alert('Cannot create XMLHTTP instance');
    //      return false;
    //   }
    //   http_request.onreadystatechange = alertContents2;
    //   http_request.open('POST', url, true);
    //   http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //   http_request.setRequestHeader("Content-length", parameters.length);
    //   http_request.setRequestHeader("Connection", "close");
    //   http_request.send(parameters);
    //   
    //   console.log('passed post');
    // };
    
    // POST TO AJAXCAPTCHA
    var validateCaptcha = function(str, form_data) {
        
        $.ajax({
            url: 'php/ajaxcaptcha.php',
            type: "POST",
            data: {
              captchaVal: str
              },
            dataType: 'json',
            success: function(data) {
                if(data['status'] === 'INVALID') {
                      alert('Please enter correct verification code.');
                      $('#recaptcha_response_field2').focus();
                } else if(data['status'] === 'SUCCESS') {
                    // continue to submit function
                    submitForm(form_data);
                    // console.log(form_data);
                } else {
                    alert('Unable to verify captcha. Please contact us.');
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
        
        // // remove all error classes
        // $('.error').removeClass('error');
        // $('.invalid_email').removeClass('invalid_email');
        // 
        var $requiredFields;
        // REQUIRED FIELDS BASED ON FORM TYPE
        if(accountType === 3) {
            $requiredFields = $('.form_long input, .form_standard input, .form_standard select');
        } else if(accountType === 2) {
            $requiredFields = $('.form_other input, .form_standard input, .form_standard select');
        } else {
            $requiredFields = $('.form_standard input, .form_standard select');
        }
        // 
        // // CHECK FOR EMPTY FIELDS
        // $requiredFields.each(function() {
        //     var value = $(this).val();
        //     
        //     // check for empty inputs
        //     if( value === '') {
        //         $(this).addClass('error');
        //     }
        // });
        // 
        // // CHECK FOR VALID EMAIL
        // var emailVal = $('#email').val();
        // var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailVal);
        // 
        // if (!validEmail && emailVal != '') {
        //     $('#email').addClass('invalid_email');
        // }
        // 
        // PUT FORM DATA IN AN ARRAY
        var values = {};
        var getValues = function() {
            // $requiredFields.each(function() {
            //     values[this.name] = $(this).val();
            // });
            values = $requiredFields.serializeArray();
            console.log(values);
        };
        // 
        // 
        // // ERROR ALERTS
        // if($('input, select').hasClass('error')) {
        //     alert('Please fill in required fields.');
        // } else if($('#email').hasClass('invalid_email')){
        //     alert('Please provide a valid email address.');
        //     $('#email').focus();
        // } else {
        //     getValues();
        // }
        
        
        getValues();
        recaptcha_response_field=form.recaptcha_response_field2.value;
        validateCaptcha(recaptcha_response_field, values);
        
        return false;
        
        // // CHECKING EMPTY FIELDS
        // // accounttype
        // if(form.accounttype.value.split(" ").join("")=="") {
        //     alert("Please select account type");
        //     form.accounttype.focus();
        //     return false;
        // }
        // // other
        // if(form.accounttype.value.split(" ").join("")=="Other" && form.accounttype_other.value.split(" ").join("")=="") {
        //     alert("Please enter account type");
        //     form.accounttype_other.focus();
        //     return false;
        // }
        // // email
        // if(form.email.value.split(" ").join("")=="") {
        //         alert("Please enter your email address.");
        //         form.email.focus();
        //         return false;
        // }
        // // VALIDATE EMAIL
        // if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value))) {
        //         alert("Please enter a proper email address.");
        //         form.email.focus();
        //         return false;
        // }
        // // password
        // if(form.password.value.split(" ").join("")=="") {
        //         alert("Please enter your password.");
        //         form.password.focus();
        //         return false;
        // }
        // // date of birth month
        // if(form.dob_month.value.split(" ").join("")=="") {
        //     alert("Please select month of birth.");
        //     form.dob_month.focus();
        //     return false;
        // }
        // // date of birth day
        // if(form.dob_day.value.split(" ").join("")=="") {
        //     alert("Please select day of birth.");
        //     form.dob_day.focus();
        //     return false;
        // }
        // // date of birth year
        // if(form.dob_year.value.split(" ").join("")=="") {
        //     alert("Please select year of birth.");
        //     form.dob_year.focus();
        //     return false;
        // }
        // // firstname
        // if(form.firstname.value.split(" ").join("")=="") {
        //     alert("Please enter first name.");
        //     form.firstname.focus();
        //     return false;
        // }
        // // lastname
        // if(form.lastname.value.split(" ").join("")=="") {
        //     alert("Please enter last name.");
        //     form.lastname.focus();
        //     return false;
        // }
        // // gender
        // if(form.gender1.checked==false && form.gender2.checked==false) {
        //     alert("Please select gender.");
        //     return false;
        // }
        // // height
        // if(form.height.value.split(" ").join("")=="") {
        //     alert("Please enter height.");
        //     form.height.focus();
        //     return false;
        // }
        // // weight
        // if(form.weight.value.split(" ").join("")=="") {
        //     alert("Please enter weight.");
        //     form.weight.focus();
        //     return false;
        // }
        // 
        // // EXTENDED FORM
        // // CHECK FOR EMPTIES
        // if($('#register_form').hasClass('extended')) {
        //     
        //     var $inputs = $('.form_long input, .form_long select');
        //     
        //     // bust
        //     if(form.bust.value.split(" ").join("")=="") {
        //         alert("Please enter your bust size.");
        //         form.bust.focus();
        //         return false;
        //     }
        //     // hips
        //     if(form.hips.value.split(" ").join("")=="") {
        //         alert("Please enter your hips size.");
        //         form.hips.focus();
        //         return false;
        //     }
        //     // shoe size
        //     if(form.shoesize.value.split(" ").join("")=="") {
        //         alert("Please enter your shoe size.");
        //         form.shoesize.focus();
        //         return false;
        //     }
        //     // inseam
        //     if(form.inseam.value.split(" ").join("")=="") {
        //         alert("Please enter your inseam.");
        //         form.inseam.focus();
        //         return false;
        //     }
        //     // neck
        //     if(form.neck.value.split(" ").join("")=="") {
        //         alert("Please enter your neck size.");
        //         form.neck.focus();
        //         return false;
        //     }
        //     // sleeve
        //     if(form.sleeve.value.split(" ").join("")=="") {
        //         alert("Please enter your sleeve size.");
        //         form.sleeve.focus();
        //         return false;
        //     } 
        //     
        //     
        // }
        // 
        // // RECAPTCHA
        // if(form.recaptcha_response_field2.value=="") {
        //     alert("Please enter security code.");
        //     form.recaptcha_response_field2.focus();
        //     return false;
        // }
        // 
        // 
        // 
        // recaptcha_response_field=form.recaptcha_response_field2.value;
        // var poststr="recaptcha_response_field2="+recaptcha_response_field;
        // makePOSTRequest2('php/ajaxcaptcha.php', poststr);
        // return true;
    };
    
    
    // $('#submit').bind('click', submitForm);
    $('#submit').bind('click', validateForm);
    
});