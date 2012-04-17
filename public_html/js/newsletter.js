$(document).ready(function() {
    
    var showNewsletterSignUp = function() {
        
        if($('.newsletter_signup').hasClass('active')) {
            $('.newsletter_signup').removeClass('active');
        } else {
            $('.newsletter_signup').addClass('active');
        }
    };
    
    var hideNewsletterSignUp = function() {
        
        if($('.newsletter_signup').hasClass('active')) {
            $('.newsletter_signup').removeClass('active');
        }
    };
    
    var postNewsletterEmail = function() {
        var email = $('#newsletter_email');
        var emailValue = $('#newsletter_email').val();
        
        var http3_SDLS1 = false;
        if(navigator.appName == "Microsoft Internet Explorer") {
          http3_SDLS1 = new ActiveXObject("Microsoft.XMLHTTP");
        } else {
          http3_SDLS1 = new XMLHttpRequest();
        }
        http3_SDLS1.abort();
        http3_SDLS1.open("GET", "php/ajax_newsletter.php?email=" + emailValue, true);
        http3_SDLS1.onreadystatechange=function()
        {
          if(http3_SDLS1.readyState == 4)
          {  
              if(http3_SDLS1.responseText==1)
              {
                $('#msg').text('Please enter email address.');
                return false;
              }
              else if(http3_SDLS1.responseText==3)
              {
                $('#msg').text('That email address is already subscribed.');
                return false;
              }
              if(http3_SDLS1.responseText==2)
              {
                $('#newsletter_form').html('<div id="msg">Thank you for subscribing.</div>');
                return false;
              }
          } 
        }
        http3_SDLS1.send(null);
    };
    
    var newsletterFormValidate = function(){
        var email = $('#newsletter_email');
        var emailValue = $('#newsletter_email').val();
        
        if(emailValue.split(" ").join("")=="")
        {
            $('#msg').text("Please enter your email address.")
            email.focus();
            return false;
        }
        else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailValue)))
        {
            $('#msg').text("Please enter a proper email address.");
            email.focus();
            return false;
        }
        else
        {
            postNewsletterEmail();    
            return false;
        }
    };
    
    var clearDefaultValue = function() {
        if($(this).attr('value') == 'Enter Your Email') {
            $(this).attr('value', '');
        }
    };
    
    var replaceDefaultValue = function() {
        if($(this).attr('value') == '') {
            $(this).attr('value', 'Enter Your Email');
        }
    };
    
    $('#newsletter_email').bind('focus', clearDefaultValue);
    $('#newsletter_email').bind('blur', replaceDefaultValue);
    
    $('#newsletter_signup_link').bind('click', showNewsletterSignUp);
    $('#close_newsletter').bind('click', hideNewsletterSignUp);
    
    $('#newsletter_submit').bind('click', newsletterFormValidate);
});