(function($) {
	
	"use strict";
	var banner_carousels_script_js = function($scope, $) {
		
		// banner-carousel
		if ($('.banner-carousel').length) {
			$('.banner-carousel').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				active: true,
				smartSpeed: 1000,
				autoplay: 6000,
				navText: [ '<span class="flaticon-next"></span>', '<span class="flaticon-next"></span>' ],
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},
					1024:{
						items:1
					}
				}
			});
		}


		// single-item-carousel
		if ($('.single-item-carousel').length) {
			$('.single-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="flaticon-next"></span>', '<span class="flaticon-next"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},			
					1200:{
						items:1
					}

				}
			});    		
		}


		// two-item-carousel
		if ($('.two-item-carousel').length) {
			$('.two-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="flaticon-next"></span>', '<span class="flaticon-next"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:2
					},			
					1200:{
						items:2
					}

				}
			});    		
		}


		// three-item-carousel
		if ($('.three-item-carousel').length) {
			$('.three-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="flaticon-next"></span>', '<span class="flaticon-next"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:2
					},			
					1200:{
						items:3
					}

				}
			});    		
		}


		// four-item-carousel
		if ($('.four-item-carousel').length) {
			$('.four-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="flaticon-next"></span>', '<span class="flaticon-next"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:3
					},			
					1200:{
						items:4
					}

				}
			});    		
		}


		// five-item-carousel
		if ($('.five-item-carousel').length) {
			$('.five-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:2
					},
					600:{
						items:3
					},
					800:{
						items:4
					},			
					1200:{
						items:5
					}

				}
			});    		
		}


		// six-item-carousel
		if ($('.six-item-carousel').length) {
			$('.six-item-carousel').owlCarousel({
				loop:true,
				margin:100,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:2
					},
					600:{
						items:3
					},
					800:{
						items:4
					},			
					1200:{
						items:6
					}

				}
			});    		
		}
		
		  		
	};
	$(window).on('elementor/frontend/init', function () {
        	elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_main_slider.default', banner_carousels_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_clients.default', banner_carousels_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_award_section.default', banner_carousels_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_blog_carousel.default', banner_carousels_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_testimonial_carousel.default', banner_carousels_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_feature_service_carousel.default', banner_carousels_script_js);
    });	

})(window.jQuery);