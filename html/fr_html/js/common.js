$(function(){

	if (jQuery(window).width() > 576) {
    
        jQuery('.homefifth-slide .owl-carousel').owlCarousel({
            items : 4,
            slideSpeed : 3000,
            nav: true,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            margin:10
        });

    } else {
    
        jQuery('.homefifth-slide .owl-carousel').owlCarousel({
            items : 1,
            slideSpeed : 3000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            margin:10
        });

	}
	
	if (jQuery(window).width() > 576) {
    
        jQuery('.homesix-slide .owl-carousel').owlCarousel({
            items : 2,
            slideSpeed : 3000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            margin:10
        });

    } else {
    
        jQuery('.homesix-slide .owl-carousel').owlCarousel({
            items : 1,
            slideSpeed : 3000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            margin:10
        });

    }


    if (jQuery(window).width() > 576) {
    
        jQuery('.media-slide .owl-carousel').owlCarousel({
            items : 1,
            slideSpeed : 3000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            autoplayTimeout:4000,
            autoplayHoverPause:false
        });

    } else {
    
        jQuery('.media-slide .owl-carousel').owlCarousel({
            items : 1,
            slideSpeed : 3000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            autoplayTimeout:4000,
            autoplayHoverPause:false
        });

    }








	var counttbe = 1;

	$(window).scroll(function(){

		if ($(".homeseven").length) {
			
		if ( ($(".homeseven").offset().top - $(window).scrollTop()) < $(window).height() / 1.5 ) {
			if (counttbe == 1) {
				$('.count').each(function () {
					$(this).prop('Counter', 0).animate({
						Counter: $(this).data('value')
						}, {
							duration: 1000,
							easing: 'swing',
							step: function (now) {                      
							$(this).text(this.Counter.toFixed());
						}
					});
				});
			}
			counttbe = 2;
        }
			
		}

	})

































})