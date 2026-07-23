(function($) {
	
	"use strict";
	var funfact_script_js = function($scope, $) {
		
		//Tabs Box
		if($('.tabs-box').length){
			$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
				e.preventDefault();
				var target = $($(this).attr('data-tab'));

				if ($(target).is(':visible')){
					return false;
				}else{
					target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
					$(this).addClass('active-btn');
					target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
					target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
					$(target).fadeIn(100);
					$(target).addClass('active-tab');
				}
			});
		}
		
		
		
		// tab-btn-carousel
		if ($('.tab-btn-carousel').length) {
			$('.tab-btn-carousel').owlCarousel({
				loop:false,
				margin:0,
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
		
		
		if ($(".odometer").length) {
			var odo = $(".odometer");
			odo.each(function () {
			  $(this).appear(function () {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			  });
			});
		  }
		
	};
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_custom_banking_tabs.default', funfact_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_funfacts.default', funfact_script_js);
            elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_form.default', funfact_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_main_banner.default', funfact_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_instant_help_tabs.default', funfact_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_forex_rates_tabs.default', funfact_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/flexibank_loan_calculator_tabs.default', funfact_script_js);
    });	

})(window.jQuery);