$(document).ready( function() {
    
    var showFirstTab = function() {
        var tabLinks = $('.tabs').find('#tabs_nav a');
        var tabContent = $('.tabs').find('.tab');
        
        // show first tab only
        $(tabLinks[0]).addClass('active');
        $(tabContent[0]).addClass('active');
    };
    
    
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
    showFirstTab();
    
});