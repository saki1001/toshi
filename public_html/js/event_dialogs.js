function frmcheck() {
    form=document.FrmProdetailpageRating;
    if(form.friendname.value=="") {
        alert("Please enter friend's name.");
        form.friendname.focus();
        return false;
    }
    else if(form.friendemail.value=="") {
        alert("Please enter friend's email address.");
        form.friendemail.focus();
        return false;
    }
    else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.friendemail.value))) {
        alert("Please enter a proper email address.");
        form.friendemail.focus();
        return false;
    }
    else if(form.yourname.value=="") {
        alert("Please enter your name.");
        form.yourname.focus();
        return false;
    }
    else if(form.youremail.value=="") {
        alert("Please enter your email.");
        form.youremail.focus();
        return false;
    }
    else if(form.emailsubject.value=="") {
        alert("Please enter subject.");
        form.emailsubject.focus();
        return false;
    }
    else if(form.message.value=="") {
        alert("Please enter your message.");
        form.message.focus();
        return false;
    }
    else {
        form.HidSubmitAddUser.value=1;
        form.submit();
        return  true;
    }
}

$(document).ready(function() {
    
    var showDialog = function() {
        
        if($('#dialog').hasClass('active')) {
            $('#dialog').removeClass('active');
        } else {
            $('#dialog').addClass('active');
        }
        
        return false;
    };
    
    var hideDialog = function() {        
        $('#dialog').removeClass('active');
        $('#dialog .active').removeClass('active');
        
        return false;
    };
    
    var showEventShare = function() {
        
        showDialog();
        
        if($('#event_share').hasClass('active')) {
            $('#event_share').removeClass('active');
        } else {
            $('#event_share').addClass('active');
        }
        
        return false;
    };
    
    var showVenueDetails = function() {
        
        showDialog();
        
        if($('#venue_details').hasClass('active')) {
            $('#venue_details').removeClass('active');
        } else {
            $('#venue_details').addClass('active');
        }
        
        return false;
    };
    
    var testHideDialog = function(event) {
        if($(event.target).attr('id') === 'dialog') {
            hideDialog();
        }
    };
    
    $('body').bind('click', testHideDialog);
    $('#close_dialog').bind('click', hideDialog);
    $('#venue_details_links').bind('click', showVenueDetails);
    $('#event_share_link').bind('click', showEventShare);
});