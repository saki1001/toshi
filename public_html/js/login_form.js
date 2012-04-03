$(document).ready(function() {
    
    // bind submit button to error checks and ajax POST
    var bindLogin = function() {
        $('#login_submit_link').bind('click', submitLogin );
    };
    
    // LOGIN PAGE
    // DEPENDENCY: uses generic functions from basic_form.js
    var submitLogin = function() {
        
        var username = $('#basic_form').find('#username').val();
        var password = $('#basic_form').find('#password').val();
        var remember_me = $('#basic_form').find('#remember_me').attr('checked');
        var nextDestination;
        
        var urlParam = $.deparam.querystring();
        var urlHash = window.location.hash;
        
        // unbind submit button, display loading message
        $('#login_submit_link').unbind('click', submitLogin );
        displayLoadingMessage();
        
        // QUERY PARAM HANDLER
        // determine next destination
        if( urlParam.next && !urlHash ){
            // forward if has only urlParam
            nextDestination = urlParam.next;
            
        } else if ( urlParam.next && urlHash ){
            // forward if has urlParam and urlHash
            nextDestination = urlParam.next + urlHash;
            
        }else {
            // forward if no urlParam
            nextDestination = '/search/';
            
        }
        
        
        // check for empty required fields
        if ( username === '' || password === '' ){
            
            checkForEmpties();
            messageHandler('Please fill in required fields.', true, bindLogin );
            
            return false;
        } else {
            
            // submit form
            $.ajax({
                type: 'POST',
                url: '/account/login_ajax/',
                data: {
                    username:username,
                    password:password,
                    remember_me:remember_me
                }, success: function(response) {
                    if( response.success === true) {
                        
                        window.location = nextDestination;
                        
                    } else {
                        
                        if( response.reason === 'NO_MATCH' ) {
                            
                            messageHandler('Incorrect username or password.', true, bindLogin );
                            
                        } else if ( response.reason === 'ALREADY_IN' ) {
                            
                            window.location = nextDestination;
                            
                        } else if ( response.reason === 'INACTIVE' ) {
                            
                            messageHandler('Your account has been suspended. Please <a href="mailto:contact@perpetually.com">contact us</a>.', false, bindLogin);
                            
                        } else {
                            
                            messageHandler('Unable to login. Please <a href="mailto:contact@perpetually.com">contact us</a>.', false, bindLogin);
                            
                        }
                    }
                }, error: function() {
                    
                    messageHandler('Unable to login. Please <a href="mailto:contact@perpetually.com">contact us</a>.', false, bindLogin);
                    
                }
            });
            
            return false;
        }
        
        
    };
    
    // REMEMBER ME CHECKBBOX
    // reference Joes plugin checkbox-normalizer.js
    $('#remember_me').checkers();
    
    // toggle checkbox
    var checkOffRememberMe = function() {
        
        var a = $(this).find('#remember_me');
        a.attr('checked', !a.attr('checked'));
        
    };
    
    // bind remember_me_section to trigger the checkbox on click
    $('.remember_me_section').click(checkOffRememberMe);
    
    // binding form inputs to focus and keydown events
    $('#login .form input').bind({
        'focus': userFormFieldFocus,
        'keydown': userFormFieldKeydown
    });
    
   bindLogin();
});