(function($){

	var homeHero = function(){
		$('.hero-text-slider').slick({
			autoplay: true,
			autoplaySpeed: 3000,
			arrows: false,
			dots: false,
			fade: true,
			speed: 1000
		});
	};
	
	var homeTeam = function(){
		
		$('.team-slider').slick({
			arrows: true,
			dots: false
		});
	};
	
	var homeProjects = function(){
		
		var homeProjectsContainer = $('.home-projects');
	
		$('.projects').slick({
			arrows: false,
			dots: false,
			fade: true,
			speed: 500,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						adaptiveHeight: true
					}
				}
			]
		});
		
		$('[data-action="project-tab"]').on('click', function(e){
			e.preventDefault();
			
			homeProjectsContainer.find('.tab').not(this).removeClass('active');
			$(this).addClass('active');
			
			$('.projects').slick('slickGoTo', $(this).index());
			
			/*var target = $(this).attr('href');
			homeProjectsContainer.find('.project').not(target).removeClass('active');
			$(target).addClass('active');*/
		});
	};
	
	var homeNews = function(){
	
		$('.news-slider').slick({
			//adaptiveHeight: true,
			arrows: true,
			dots: false
		});
	};
	
	var designGallery = function(){
		$('.gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title');
				}
			}
		});
	};

	$(document).ready(function(){
		if($('body').hasClass('home')){
			homeHero();
			homeTeam();
			homeProjects();
			homeNews();
		}
		designGallery();
	});

})(jQuery);