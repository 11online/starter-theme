jQuery(function( $ ){
  // add smooth scrolling on clicked anchors
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
      	// this is in case there is a sticky header on the home page
        if($('body').hasClass('home')) {
          var scrollTop = parseInt(target.offset().top) - parseInt($('.site-header').height());
          $('html, body').animate({
            scrollTop: scrollTop
          }, 1000);
        } else {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
        }
        return false;
      }
    }
  });
});
