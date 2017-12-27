(function($){

	var docReady = function(){
		console.log( 'Doc ready!' );
	};
	
	var homePageHero = function(){
		$('.hero-text-slider').slick({
			autoplay: true,
			autoplaySpeed: 3000,
			arrows : false,
			dots: false,
			fade: true,
			speed: 1000
		});
	};

	$(document).ready(function(){
		homePageHero();
		//docReady();
		//$('body').on('contextmenu', 'img', function(e){ return false; });
	});

})(jQuery);