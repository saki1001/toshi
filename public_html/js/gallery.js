$(document).ready( function() {
    
    var submitQuery = function(e) {
        document.filterEventForm.submit()
    };
    
    
    var hideShowMonths = function(currentYear, selectedYear) {
        if(currentYear != selectedYear) {
            $('.future_month').addClass('active');
        } else {
            $('.future_month').removeClass('active');
        }
    };
    
    var checkYearOnChange = function(e) {
        var currentYear = $('#current_year').val();
        var selectedYear = $(this).val();
        
        hideShowMonths(currentYear, selectedYear);
        
        submitQuery();
    };
    
    var checkYear = function() {
        var currentYear = $('#current_year').val();
        var selectedYear = $('#year option:selected').val();
        
        hideShowMonths(currentYear, selectedYear);
    };
    
    checkYear();
    
    $('#month, #category').bind('change', submitQuery);
    $('#year').bind('change', checkYearOnChange);
    
});