$(document).ready(function () {
    $( function() {
        $("#book-room").datepicker();
        $("#check").datepicker();
    });
    $('#language').click(function(){
        $('.language-list').toggleClass('active')
    });
});
$(document).ready(function(){
    $('.slider-banner').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        cssEase: 'linear',
        fade: true,
        autoplaySpeed: 1000,
        speed: 1000,
        autoplay: true,
    });
    $('.list-restroom').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 1000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
        ]
    });
    $('.slider-image-wrapper').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 1000,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
        ]
    });
    $('.slider-services').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 1000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
        ]
    });
    $('.slider-new-wrapper').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 1000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
        ]
    });
    $('.btn-ungtuyen').click(function(){
        $('.overlay').fadeIn();
        $('.application').fadeIn();
    });
    $('.overlay').click(function(){
        $('.overlay').fadeOut();
        $('.application').fadeOut();
    });
    $('.close').click(function(){
        $('.overlay').fadeOut();
        $('.application').fadeOut();
    });
    $('.slider-resroom').slick({
        centerMode: true,
        slidesToShow: 1,
        dots: false,
        arrows: false,
        variableWidth: true,
        draggable: true,
        autoplay: true,
        speed: 500,
    });
    $('.btn-nav').click(function(){
        $('.menu-mobie').toggleClass('active')
    });
    // $('.read-more').click(function(){
    //     $('.desc').toggleClass('show-desc')
    //     $('.read-more').toggleClass('swap')
    // });
    $('.close-menu-mobie').click(function(){
        $('.menu-mobie').toggleClass('active')
    });
    $(".item-sub-mobile").on('click', function () {
		if($(this).hasClass('activeee')){
			let key = $(this).attr('data-key');
			$(this).parents('li').removeClass('menu-child');
			$(".item-key" + key).slideUp();
			$(this).removeClass('activeee');
		}else {
			$(".sub-mobile").slideUp();
			let key = $(this).attr('data-key');
			$(this).parents('li').addClass('menu-child');
			$(".item-key" + key).slideDown();
			$(this).addClass('activeee');
		}
	});
    $('#language-mobie').click(function(){
        $('.language-list-mobie').toggleClass('show-language')
    })
    $('.btn-check-phong').click(function(){
        $('.banner').toggleClass('show-check-room')
    })
    $('.slider-room').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        speed: 1000,
    });
    $('.senrena-resroom-list-orther').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        speed: 1000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                }
            },
        ]

    });
})
$(document).ready(function () {
    const $lgContainer = document.getElementById("js-gallery");
    const lg = lightGallery($lgContainer, {
        animateThumb: true,
        allowMediaOverlap: true,
        toggleThumb: true,
        download: false,
        speed: 500,
        slideShowAutoplay: true,
        plugins: [lgThumbnail, lgFullscreen],
        fullScreen: true,
        showZoomInOutIcons: false,
        actualSize: true,
    });
});
$(document).ready(function () {
    const $lgContainer = document.getElementById("library-image-child");
    const lg = lightGallery($lgContainer, {
        animateThumb: true,
        allowMediaOverlap: true,
        toggleThumb: true,
        download: false,
        speed: 500,
        slideShowAutoplay: true,
        plugins: [lgThumbnail, lgFullscreen],
        fullScreen: true,
        showZoomInOutIcons: false,
        actualSize: true,
    });
});
const addMaximumScaleToMetaViewport = () => {
    const el = document.querySelector('meta[name=viewport]');

    if (el !== null) {
        let content = el.getAttribute('content');
        let re = /maximum\-scale=[0-9\.]+/g;

        if (re.test(content)) {
            content = content.replace(re, 'maximum-scale=1.0');
        } else {
            content = [content, 'maximum-scale=1.0'].join(', ')
        }

        el.setAttribute('content', content);
    }
};
  
const disableIosTextFieldZoom = addMaximumScaleToMetaViewport;
  
const checkIsIOS = () =>
    /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
  
if (checkIsIOS()) {
    disableIosTextFieldZoom();
}

document.addEventListener( 'wpcf7mailsent', function( event ) {
	jQuery('.successModal').removeClass('hidden');
}, false );

function closeModal() {
    jQuery('.successModal').addClass('hidden');
}
jQuery(document).ready(function(){
    var Backtotop = function () {
      if (jQuery('.backtotop').length) {
        var scrollTrigger = 500,
        backToTop = function () {
          var scrollTop = jQuery(window).scrollTop();
          if (scrollTop > scrollTrigger) {
            jQuery('.backtotop').addClass('show-backtotop');
          } else {
            jQuery('.backtotop').removeClass('show-backtotop');
          }
        };
        backToTop();
        jQuery(window).on('scroll', function () {
          backToTop();
        });
        jQuery('.backtotop').on('click', function (e) {
          e.preventDefault();
          jQuery('html,body').animate({
            scrollTop: 0
          }, 500);
        });
      }
    }
    Backtotop();
});