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

function shuffle(array) {
  let currentIndex = array.length,  randomIndex;

  // While there remain elements to shuffle...
  while (currentIndex != 0) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;

    // And swap it with the current element.
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex], array[currentIndex]];
  }

  return array;
}

// Used like so



//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {

  //home
  // shuffle images
  var arr = $('.grid-item');
  shuffle(arr);
  console.log(arr);
  $('#image-grid').empty().append(arr);

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



//----------END JQUERY -----------
});
