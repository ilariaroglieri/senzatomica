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
  $('#image-grid').empty().append(arr);

  // hide on hover
  $('.grid-item').hover(function(i, el) {
    $(this).addClass('hidden');
  });



 

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
    $('div[class*="menu-main"]').toggleClass('active');
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


  // BREAK SENTENCE IN WORDS
  var variableType = $('.variable-type').find('h2').text();

  var splitWords = variableType.split(" ");
  $('.variable-type').find('h2').empty();

  for (var i = 0; i < splitWords.length; i++) {
    $('.variable-type').find('h2').append('<div>'+splitWords[i]+'</div>');
    // var splitLetters = splitWords[i].split('');
  }

  // BREAK WORDS IN LETTERS
  $('.variable-type div h2 > div').each(function(i, el) {
    var splitLetters = $(el).text().split("");
    console.log(splitLetters);

    if (splitLetters.length <= 3) {
      $(el).addClass('condensed');
    } else if (splitLetters.length >= 4 && splitLetters.length < 6) {
      $(el).addClass('extended');
    } else if (splitLetters.length >= 6 && splitLetters.length <= 8) {
      $(el).addClass('regular');
    } else if (splitLetters.length > 8) {
      $(el).empty();

      for (var i = 0; i < splitLetters.length; i++) {
        $(el).append('<span class="extended">'+splitLetters[i]+'</span>');

        var weights = ['xcondensed','condensed','regular','extended'];

        var letters = $(el).find('span');
        var randomLetters = letters[Math.floor(Math.random() * (letters.length - 1))];

        $(letters[0]).removeClass('extended').addClass('xcondensed');
        $(letters[1]).removeClass('extended').addClass('xcondensed');
        $(letters[2]).removeClass('extended').addClass('condensed');
        $(letters[3]).removeClass('extended').addClass('condensed');
        $(letters[4]).removeClass('extended').addClass('regular');
        $(letters[5]).removeClass('extended').addClass('regular');

        // $(randomLetters).addClass(weights[Math.floor(Math.random() * weights.length)]);
      }
    }
  });

  // ASSIGN RANDOM CLASSES TO SOME LETTERS




//----------END JQUERY -----------
});
