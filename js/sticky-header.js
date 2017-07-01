jQuery(function( $ ){

  if($('body').hasClass('home')) {
    $(window).scroll( function () {
      if($(window).scrollTop() > 200 && window.innerWidth > 800) {
        $('.site-header').addClass('sticky');
        $('body').addClass('sticky');
      } else {
        $('.site-header').removeClass('sticky');
        $('body').removeClass('sticky');
      }
    });
  }
});
