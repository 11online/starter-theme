jQuery(function( $ ){
  $(".genesis-nav-menu").addClass("responsive-menu");
  $("nav").before('<div class="responsive-menu-icon"></div>');

	$(".responsive-menu-icon").click(function(){
		$(".responsive-menu").slideToggle();
	});

	$(window).resize(function(){
		if(window.innerWidth > 800) {
			$(".genesis-nav-menu, nav .sub-menu").removeAttr("style");
			$(".responsive-menu > .menu-item").removeClass("menu-open");
		}
	});

	$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});

