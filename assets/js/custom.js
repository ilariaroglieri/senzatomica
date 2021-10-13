function checkScroll() {
	var currentScrollPos = $(window).scrollTop();

  if ($('body').hasClass('home')) {
  	if (currentScrollPos > window.innerHeight) {
  		$('.icon, #logo, .menu-toggle').removeClass('white');
    } else {
  		$('.icon, #logo, .menu-toggle').addClass('white');
    }
  }
}

//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {

// --- header behaviour
	
  // scroll events
  // var prevScrollPos = $(window).scrollTop();
  // $(window).scroll(function() {
  //   checkScroll();

  //   var currentScrollPos = $(window).scrollTop();
  //   if (prevScrollPos > currentScrollPos && prevScrollPos > 0) {
	 //    $('#logo').addClass('visible')
	 //  } else {
	 //    $('#logo').removeClass('visible')
	 //  }

	 //  prevScrollPos = currentScrollPos;
  // });



// --- Hamburger menu
  $('.menu-toggle').click(function() {
    $(this).toggleClass('open');
    $('div[class*="menu-1"]').toggleClass('active');
    // check if it's on slider
  	if ( $('body').hasClass('home') && $(window).scrollTop() < window.innerHeight ) {
  		$('#logo').addClass('visible')
  	}

    if ($(this).hasClass('open') == true) {
    	$('#logo').addClass('visible');
    } else {
    	$('#logo').removeClass('visible');
    }
  });

// --- slider init
  $('.slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    autoplaySpeed: 3000,
    speed: 1000,
    cssEase: 'ease',
    useTransform: false
  });


//----------END JQUERY -----------
});
