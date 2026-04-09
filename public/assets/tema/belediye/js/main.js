// Initialize Swiper

    var swiper1 = new Swiper('.swiper1', {
	 autoplay: {
		 delay: 5000,
	 },
      pagination: {
        el: '.swiper-pagination2',
		clickable: true,
		renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    var swiper2 = new Swiper('.swiper2', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        height: 80,
        mousewheel: true,
		autoplay: {
			delay: 5000,
		},
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
        nextEl: '.hbr-ileri',
        prevEl: '.hbr-geri',
      },
    });
    var swiper3 = new Swiper('.swiper3', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        height: 50,
        mousewheel: true,
        pagination: {
          el: '.swiper-pagination3',
          clickable: true,
        },
        navigation: {
        nextEl: '.halkoyunlari-geri',
        prevEl: '.halkoyunlari-ileri',
      },
    });
    var swiper4 = new Swiper('.swiper4', {
      slidesPerView: 3,
      spaceBetween: 30,
      navigation: {
        nextEl: '.hizmetileri',
        prevEl: '.hizmetgeri',
      },
    });
    var swiper5 = new Swiper('.swiper5', {
      spaceBetween: 30,
       pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.neleryaptikileri',
        prevEl: '.neleryaptikgeri',
      },
    });
    var swiper6 = new Swiper('.swiper6', {
      spaceBetween: 30,
       pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.neleryaptikileri1',
        prevEl: '.neleryaptikgeri1',
      },
    });
    var swiper7 = new Swiper('.swiper7', {
      spaceBetween: 30,
       pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
    var swiper8 = new Swiper('.swiper8', {
      spaceBetween: 30,
       pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
      navigation: {
        nextEl: '.mobilslidegeri',
        prevEl: '.mobilslideileri',
      },
    });
    var swiper9 = new Swiper('.swiper9', {
      slidesPerView: 3,
      slidesPerColumn: 2,
      spaceBetween: 0,
    });
    var swiper10 = new Swiper('.swiper10', {
      slidesPerView: 4,
      spaceBetween: 15,
      slidesPerGroup: 4,
      navigation: {
        nextEl: '.button-nextm',
        prevEl: '.button-prevm',
      },
    });
    var swiper2hbr = new Swiper('.swiper2hbr', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        height: 80,
        mousewheel: true,
		autoplay: {
			delay: 5000,
		},
        navigation: {
        nextEl: '.haberlergeri',
        prevEl: '.haberlerileri',
      },
    });
    var swiper11 = new Swiper('.swiper11', {
      spaceBetween: 30,
       pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.neleryaptikileri11',
        prevEl: '.neleryaptikgeri11',
      },
    });
    var swiper13 = new Swiper('.swiper12', {
      pagination: {
        el: '.toplamsayi',
        type: 'fraction',
      },
	   autoplay: {
		 delay: 5000,
		},
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

  //tiyatro slide
var totalItems = $('.carousel-item').length;
var currentIndex = $('div.active').index() + 1;
$('.num').html('<span class="currentin">'+currentIndex+'</span>/<span class="totalit">'+totalItems+'</span>');



$('#carouselExampleControls').carousel({
    interval: 2000
});

$('#carouselExampleControls').bind('slid', function() {
    currentIndex = $('div.active').index() + 1;
   $('.num').html(''+currentIndex+'/'+totalItems+'');
});

$(".category-dropdown-button").click(function(g) {
	g.preventDefault();
	$(this).parent("li").find(".dropdown").slideToggle()
});

$(document).ready(function() {
	$("a#single_image").fancybox();
	$("a.grouped_elements").fancybox();
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});	
	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});	
});

// left nav
$('.leftNavOpen a').on('click', function(){
	$('.leftNav').toggleClass('openActive');
});

// news load

var a = $('#webofisiLoad');
var b = $('#webofisiLoad2');
var c = $('#webofisiLoad3');

a.find('li:gt(1)').addClass('wow fadeInUp');
b.find('li:gt(2)').addClass('wow fadeInUp');
c.find('li:gt(0)').addClass('wow fadeInLeft');

$(function() {
    $("#tabmenu .webofisiTabContent").hide(); // tüm sekme içeriklerinin gizledik
    $("#tabmenu .webofisiTabContent").first().show(); // ilk sekme içeriğini gösterdik

    $("#tabmenu .sekme li").on("click", function() {
        let sira = $(this).index(); // sıra numarasını aldık

        $("#tabmenu .webofisiTabContent").hide(); // tüm sekmeleri gizledik
        $("#tabmenu .webofisiTabContent").eq(sira).show(); // tıklanan sekme içeriğini gösterdik

        $("#tabmenu .sekme li").removeClass("active"); // tüm sekmelerden sıra aktif sınıfını kaldırdık
        $(this).addClass("active"); // tıklanan sekmeye aktif sınıfını ekledik
    });
});

