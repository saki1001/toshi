// Generic Form Functions Used In:

// LOADING:
// clear messages while loading
var displayLoadingMessage = function() {
    $('.error').removeClass('error');
    $('#basic_form').find('#message').text('Loading...').css('visibility', 'visible');
};

// EMPTY FIELD ERROR:
// find fields that are empty and
// set errors on required fields
var checkForEmpties = function() {
    
    $('.required').each(function() {
        var value = $(this).val();
        
        if( value === '' || value === 'default') {
            
            $(this).addClass('error');
        }
    });
};

// MESSAGES/ERRORS:
// display messages, rebind click handler
var messageHandler = function( message, error_class, rebindSubmit ) {
    
    if ( error_class ){
        
        $('#basic_form').find('#message').addClass('error').html(message)
            .css('visibility', 'visible');
        
    } else{
        
        $('#basic_form').find('#message').html(message)
            .css('visibility', 'visible');
        
    }
    
    // rebind submit button to correct binding function
    rebindSubmit();
    
    return false;
};

// STATUS:
// hide form and display status message after submit
var submitStatusHandler = function( message ) {
    
    $('#basic_form').find('.form').hide();
    $('#basic_form').find('#submit_status').css('display', 'block')
        .html(message);
};

// BIND ENTER
// submits form when pressing 'Enter'
var userFormFieldKeydown = function(e) {
    
    var submitButton = $('#basic_form').find('.submit_button .button');
    var keyPressed = e.keyCode;
    
    
    if( keyPressed === 13 ){
        
        $(submitButton).click();
        return false;
    }
    
};

// BIND FOCUS
// selects all text on focus
var userFormFieldFocus = function(){
    
    // fixes select() in webkit browsers
    var webkitMouseupFix = function() {
        // unbinds event
        $(this).unbind('mouseup.webkit', webkitMouseupFix );
        // fixes mouseup by return false
        return false;
    };
    
    // select text in input field
    $(this).select();
    // calls webkit fix
    $(this).bind('mouseup.webkit', webkitMouseupFix );
    
    return false;
};