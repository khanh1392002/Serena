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
    });
    $('.list-restroom').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
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
    $('.endow-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
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
    $('.slider-resroom').slick({
        centerMode: true,
        slidesToShow: 1,
        dots: false,
        arrows: false,
        variableWidth: true,
        draggable: true,
    });
    $('.btn-nav').click(function(){
        $('.menu-mobie').toggleClass('active')
    });
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
    $('.slider-room').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
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