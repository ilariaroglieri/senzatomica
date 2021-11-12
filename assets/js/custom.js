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
  if ( $('body').hasClass('home')) {
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


    var viewportH = window.innerHeight;
    function scaleOnScroll(el, scroll, maxVal, minVal, property, unit) {
      var percentScroll = scroll/(viewportH/3);
      
      var minWidth = 100;
      var maxWidth = 20;
      var val = percentScroll * (maxVal - minVal) + minVal;

      if (val < maxVal) {
        val = maxVal;
      };

      el.css(property, val + unit);
    }
    
    // scroll effect on home
    $(window).scroll(function() {
      var currentScrollPos = Math.round( $(document).scrollTop() );
      var rows = Math.round(viewportH/20);
      var newRow = 0;
     
      //scale logo and header
      scaleOnScroll($('#logo svg'), currentScrollPos, 16, 100, 'width', '%');
      scaleOnScroll($('#header .container'), currentScrollPos, 5, 50, 'height', 'vh');

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

      // show menu and hide grid 
      if (currentScrollPos > viewportH/3) {
        $('.menu-toggle').removeClass('hidden');
        $('#image-grid-container').hide();
      } else {
        // $('.menu-toggle').addClass('hidden');
      }
    });
  }


  // --- Hamburger menu
  $('.menu-toggle').click(function() {
    // save dimensions of header
    
    $(this).toggleClass('open');
    $('div[class*="menu-main"]').toggleClass('active');
    // check if it's on slider
  	if ( $('body').hasClass('home') && $(window).scrollTop() < window.innerHeight ) {
      if ($(this).hasClass('open') == true) {
        $('#header .container').css('height', '5vh');
        $('#header #logo svg').css('width', '20%');
        $('html, body').addClass('overflow-hidden');
        var headerH = $('#header .container').css('height');
      } else {
        $('#header .container').css('height', headerH);
        $('html, body').removeClass('overflow-hidden');
      }
  	}
  });


  // BREAK WORDS IN LETTERS
  $('.variable-type > span').each(function(i, el) {
    var splitLetters = $(el).text().split("");

    if (splitLetters.length <= 3) {
      $(el).addClass('condensed');
    } else if (splitLetters.length >= 4 && splitLetters.length < 6) {
      $(el).empty();

      for (var i = 0; i < splitLetters.length; i++) {
        $(el).append('<span class="variable regular">'+splitLetters[i]+'</span>');

        var letters = $(el).find('.variable');
        var randomLetters = letters[Math.floor(Math.random() * (letters.length - 1))];

        $(letters[1]).removeClass('regular').addClass('condensed');
        $(letters[2]).removeClass('regular').addClass('condensed');
      }
    } else if (splitLetters.length >= 6 && splitLetters.length < 8) {
      $(el).empty();

      for (var i = 0; i < splitLetters.length; i++) {
        $(el).append('<span class="variable condensed">'+splitLetters[i]+'</span>');

        var letters = $(el).find('.variable');
        var randomLetters = letters[Math.floor(Math.random() * (letters.length - 1))];


        $(letters[2]).removeClass('condensed').addClass('extendend');
        $(letters[3]).removeClass('condensed').addClass('extended');
        $(letters[4]).removeClass('condensed').addClass('normal');

      }
    } else {
      $(el).empty();

      for (var i = 0; i < splitLetters.length; i++) {
        $(el).append('<span class="variable extended">'+splitLetters[i]+'</span>');

        var letters = $(el).find('.variable');
        var randomLetters = letters[Math.floor(Math.random() * (letters.length - 1))];

        $(letters[7]).removeClass('extended').addClass('xcondensed');
        $(letters[6]).removeClass('extended').addClass('xcondensed');
        $(letters[5]).removeClass('extended').addClass('condensed');
        $(letters[4]).removeClass('extended').addClass('condensed');
        $(letters[3]).removeClass('extended').addClass('regular');
        $(letters[2]).removeClass('extended').addClass('regular');
      }
    }

    $('')
  });

  // divide posts into rows
  var posts = $('#content-archive-news').find($('.post'));
  var elements = [];

  posts.each(function(i, el) {
    var obj = {
      'id' : [],
      'offsetTop' : []
    };
    var topPos = $(el).offset().top;
    obj.offsetTop.push(topPos);
    obj.id.push($(el).attr('id'));

    elements.push(obj);
  });

  var elGroups = {};

  for (const el of elements) {
    if (!elGroups[el.offsetTop]) {
      elGroups[el.offsetTop] = []
    }
    elGroups[el.offsetTop].push(el);
  }

  var elGrouped = Object.values(elGroups);

  for (var i = 0; i < elGrouped.length; i++) {
    for (var j = 0; j < elGrouped[i].length; j++) {
      console.log(i);
      var ids = elGrouped[i][j].id;
      var post = $('#'+ ids);
      post.attr('data-group', i);
    }
    $('#content-archive-news .post[data-group="'+i+'"').wrapAll('<div class="row-container container"><div class="d-flex flex-row"></div></div>');
  }


  // copy dynamic stripes every three rows
  $('#content-archive-news .dynamic-stripe').clone().addClass('added').insertAfter('.row-container:nth-of-type(3n+3)');
  $('#content-archive-news .dynamic-stripe:even').addClass('primaryColor');

  // marquee('div.marquee.added');





//----------END JQUERY -----------
});
