// Iris Color Picker
jQuery(function() {
    jQuery('.color-picker').wpColorPicker();
});

// End Iris Color Picker

jQuery(document).ready(function($) {
    $("#tabs").tabs();
});

var tabsHeight = jQuery('#tabs').height();
jQuery(document).ready(function() {
    jQuery('.ui-tabs-nav').css({
        height: tabsHeight
    });
    jQuery('.ui-tabs-panel').css({
        height: tabsHeight
    });
});