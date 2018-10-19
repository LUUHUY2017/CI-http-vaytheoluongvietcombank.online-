$(document).ready(function(){
 	$('.carousel').slick({
 		arrows: false,
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true,
		// autoplay: true,
  		// autoplaySpeed: 2000,
	});
	$('.btngrid').click(function(){
		$('.row .baiviet').addClass('showgrid');
		$(this).addClass('doimau');
		$('.btnlist').removeClass('doimau');
	});
	$('.btnlist').click(function(){
		$('.row .baiviet').removeClass('showgrid');
		$(this).addClass('doimau');
		$('.btngrid').removeClass('doimau');
	});
	$('.nut-chuyen').click(function(){
		$('.gach:nth-child(1)').toggleClass('xoay45');
		$('.gach:nth-child(2)').toggleClass('hide');
		// $('.gach:nth-child(2)').css('display','none');
		$('.gach:nth-child(3)').toggleClass('xoay-45');
		$('.menu-ngang ul li').toggleClass('show');
	});
});