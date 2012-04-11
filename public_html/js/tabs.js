$(document).ready( function() {
    
    var tabsShowHide = function() {
        
        tabLink = $(this);
        tabId = $(this).attr('href');
        tabContent = $(tabId);
        
        if( tabLink.hasClass('active')) {
            // do nothing
        } else {
            // remove all active classes
            $('.tabs .active').removeClass('active');
            
            // make current link and
            // corresponding content active
            tabLink.addClass('active');
            tabContent.addClass('active');
            
        }
        
        return false;
    };
    
    $('#tabs_nav a').bind('click', tabsShowHide);
    
});