function slideSwitch(switchSpeed) {
    var $active = $('#slideshow .rotar.active');
    
    if ( $active.length == 0 ) $active = $('#slideshow .rotar:last');

    var $next =  $active.next('.rotar').length ? $active.next('.rotar')
        : $('#slideshow .rotar:first');

    $active.addClass('last-active');
    
    
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, switchSpeed, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval ( "slideSwitch(1000)", 1000 );    
});