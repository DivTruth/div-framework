/*
Custom Scripts File

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load. */

/**
 * IE8 ployfill for GetComputed Style (for Responsive Script below)
 */
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

/**
 * As the page loads, call these scripts
 */
jQuery(document).ready(function($) {
    /* getting viewport width */
    var responsive_viewport = $(window).width();

    /* Smooth scrolling for on page links */
    $('.smoothscroll').on('click.smoothscroll',function (e){
        e.preventDefault();

        var target = this.hash,
        $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top-0
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });

    
    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* if is below 481px */
    if (responsive_viewport < 481) {
        
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
    } /* end larger than 481px */
    
    /* if is below or equal to 768px */
    if (responsive_viewport <= 767) {
        /* Smooth scrolling for on page links (Mobile only) */
        $('body').on('click','.smoothscroll-mobile',function (e){
            e.preventDefault();

            var target = this.hash,
            $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top-0
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    }

    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
        /* Smooth scrolling for on page links (Mobile only - continued) */
        $('body').on('click','.smoothscroll-mobile',function (e){
            e.preventDefault();
            return false;
        });

        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });
    }
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }
    	
    /* 
    jQuery Mobile Navigation 
    */
    /* toggle sliding nav and show/hide class */
    $(".menu-icon").on("click", function(){
        $(this).toggleClass('open-close');
        $("nav#mobile").slideToggle();
        $("#mobile").toggleClass('open-close');
    
    }); 
    $(".search-icon").on("click", function(){
        $(this).toggleClass('open-close');
        $(".mobile-search-container").slideToggle();
        $(".mobile-search-container").toggleClass('open-close');
    }); 

    /**
     * Example BxSlider
     * Documentation: http://bxslider.com/options
     */
    if (typeof(bxSlider) === "function") { 
        $('#bxslider').bxSlider({
              autoStart: true,
        });
    }

}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );