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

function shuffle(arr) {
  arr.sort(function() {return .5 - Math.random()});
  return arr;
}

function setIntervalNtimes(callback, delay, repetitions) {
  var x = 0;
  var intervalID = window.setInterval(function () {
  
    callback();

    if (++x === repetitions) {
      window.clearInterval(intervalID);
    }
  }, delay);
}


function hideRandomImg(arr, n) {
  shuffle(state.visibleImg);

  var indexes = state.visibleImg.splice(0,n);
  state.hiddenImg = state.hiddenImg.concat(indexes);
  
  indexes.forEach(function(index) {
    $(index).addClass('hidden');
  });
}

var state = {
  "visibleImg": [],
  "hiddenImg": [],
  "currentRow": 0,
};



//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {

  //home
  // shuffle images
  var imagesGrid = $('.grid-item');
  shuffle(imagesGrid);
  $('#image-grid').empty().append(imagesGrid);

  imagesGrid.each(function(el, i) {
    state.visibleImg.push(i);
  });

  // hide on hover
  $('.grid-item').hover(function(i, el) {
    $(this).addClass('hidden');
  });
  
  // scroll effect on home
  var viewportH = window.innerHeight;
  $(window).scroll(function() {
    var currentScrollPos = Math.round( $(document).scrollTop() );
    var rows = Math.round(viewportH/3);
    var newRow = 0;

    // update row below half viewpoer
    for (var i = 1; i <= 3; i++) {
      if ( currentScrollPos > rows*i ) {
        newRow = i;
      } 
    }

    // hide grid images
    if (newRow != state.currentRow) {
      state.currentRow = newRow;

      hideRandomImg(imagesGrid, imagesGrid.length/3);
    }

    // show menu and scale logo 
    if (currentScrollPos > viewportH) {
      $('.menu-toggle').removeClass('hidden');
      $('#header').removeClass('huge');
      $('#image-grid-container').hide();
    } else {
      $('.menu-toggle').addClass('hidden');
      $('#header').addClass('huge');
    }
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
