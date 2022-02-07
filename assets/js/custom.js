var mqMobile = window.matchMedia('(max-width: 640px)');
var mqHoverDevices = window.matchMedia('(hover: none)');


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

const classes = document.body.classList;
let timer = 0;
window.addEventListener('resize', function () {
  if (timer) {
    clearTimeout(timer);
    timer = null;
  }
  else
    classes.add('stop-transitions');

  timer = setTimeout(() => {
    classes.remove('stop-transitions');
    timer = null;
  }, 100);
});


//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {
  // fade in effect on conent
  $('body').addClass('loaded');

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
      var val = percentScroll * (maxVal - minVal) + minVal;

      if (val < maxVal) {
        val = maxVal;
      };

      el.css(property, val + unit);
    }
    
    // scroll effect on home
    $(window).scroll(function() {
      var currentScrollPos = Math.round( $(document).scrollTop() );
      var vh = $(window).height();
      var rows = Math.round(viewportH/20);
      var newRow = 0;

      console.log(vh * .05);
     
      //scale logo and header
      scaleOnScroll($('#logo svg'), currentScrollPos, (240), (vh * 1.3), 'width', 'px');
      scaleOnScroll($('#header .container'), currentScrollPos, (55), (vh * .35), 'height', 'px');

      // update row below half viewport
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
        imagesGrid.addClass('hidden');
        $('#image-grid-container').hide();
      } 
    });
  }

  var currentScrollPos = Math.round( $(document).scrollTop() );
  if (currentScrollPos > 0) {
    $('.menu-toggle').removeClass('hidden');
    $('#image-grid-container').hide();
  }


  // --- Hamburger menu
  $('.menu-toggle').click(function() {
    // save dimensions of header
    $('html, body').toggleClass('overflow-hidden');
    $(this).toggleClass('open');
    $('div[class*="menu-main"]').toggleClass('active');
    // check if it's on slider
  	if ( $('body').hasClass('home') && $(window).scrollTop() < window.innerHeight ) {
      if ($(this).hasClass('open') == true) {
        $('#header .container').css('height', '6vh');
        $('#header #logo svg').css('width', '240px');
        $('html, body').addClass('overflow-hidden');
        var headerH = $('#header .container').css('height');
      } else {
        $('#header .container').css('height', headerH);
        $('html, body').removeClass('overflow-hidden');
      }
  	}
  });

  // intro images flickr
  $('.intro-images').on('mousemove',function(){
    setTimeout(function() {
      $('.secondary-image').toggleClass('hidden');
    }, 50);
  }).on('mouseleave',function() {
    $('.secondary-image').addClass('hidden');
  });

  // countdown
  if ( $('body').hasClass('home')) {
    //first test
    var firstCountDownDate = new Date('1945-08-06T12:00:00').getTime();
    
    var y = setInterval(function() {
      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = now - firstCountDownDate;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var years = 0;
      if (days > 365) {
        years = Math.floor(days/365);
        days = days % 365;
      }
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("FTyears").innerHTML =  years;
      document.getElementById("FTdays").innerHTML =  days;
      document.getElementById("FThours").innerHTML =  hours;
      document.getElementById("FTminutes").innerHTML =  minutes;
      document.getElementById("FTseconds").innerHTML =  seconds;
    }, 1000);

    //last test
    var LTdate = $('.countdown-test-date').text();
    var LTtime = $('.countdown-test-time').text();
    var countDownDate = new Date(LTdate+'T'+LTtime).getTime();
    
    var x = setInterval(function() {
      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = now - countDownDate;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var years = 0;
      if (days > 365) {
        years = Math.floor(days/365);
        days = days % 365;
      }
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("years").innerHTML =  years;
      document.getElementById("days").innerHTML =  days;
      document.getElementById("hours").innerHTML =  hours;
      document.getElementById("minutes").innerHTML =  minutes;
      document.getElementById("seconds").innerHTML =  seconds;
    }, 1000);
  }

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

  });

  // homepage spinning wheel
  var prevRotation = 0;
  var prevSlice = 0;
  $('#question-wheel, .wheel-button').click(function() {
    questo = $('#question-wheel');
    var randomSlice = (Math.floor(Math.random() * 10)+1);
    var rotation = 1440 + (randomSlice*36);

    prevRotation = prevRotation + rotation;
    prevSlice = (prevSlice + randomSlice);

    if (prevSlice > 10) {
      prevSlice = prevSlice - 10;
    }
    
    questo.parent().parent().addClass('d-half-pad');
    questo.css('transform','rotate('+ prevRotation + 'deg)');
    $('.slice-container').addClass('visible');
    $('.slice-content').removeClass('active');
    $('.slice-container').find('.slice-content[data-slice="slice-' + prevSlice + '"]').addClass('active');

    // console.log('[data-slide="slice-' + prevSlice + '"]');
  });

  if (mqHoverDevices.matches) {
    $('.slice-content .close').click(function() {
      $('#question-wheel').parent().parent().removeClass('d-half-pad');
      $('.slice-container').removeClass('visible');
      $('.slice-content').removeClass('active');
    });
  } else {
    $('.slice-content').click(function() {
      $('#question-wheel').parent().parent().removeClass('d-half-pad');
      $('.slice-container').removeClass('visible');
      $('.slice-content').removeClass('active');
    });
  }

  // divide posts into rows
  function createArchiveRows() {
    var posts = $('#content-archive-news, #content-archive, #content-search').find($('.hentry'));
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
        var ids = elGrouped[i][j].id;
        var post = $('#'+ ids);
        post.attr('data-group', i);
      }
      $('#content-archive-news, #content-archive, #content-search').find('.hentry[data-group="'+i+'"').wrapAll('<div class="row-container container"><div class="d-flex flex-row"></div></div>');
    }


    // copy dynamic stripes every three rows
    $('#content-archive-news .dynamic-stripe').clone().addClass('added').insertAfter('.row-container:nth-of-type(3n+3)');
    $('#content-archive-news .dynamic-stripe:even').addClass('primaryColor');
  }

  createArchiveRows();

  $('.page-title').marquee({
    startVisible: true,
    gap: 0,
    delayBeforeStart: 0,
    direction: 'right',
    duplicated: true,
    duration: 18000,
  });

  $('.page-keywords').marquee({
    startVisible: true,
    gap: 0,
    delayBeforeStart: 0,
    direction: 'left',
    duplicated: true,
    duration: 15000,
  });

  // back to top button
  $('.backup').click(function() {
    $('html, body').animate({ scrollTop: 0 }, 300);
    return false;
  });

  // archive suggested searchs
  var colors = ['#79fc96','#FABAF0','#FC9251','#BF9EED'];
  $('.suggested-search, .menu li > .sub-menu li a').mouseenter(function() {
    var randomCol = colors[Math.floor(Math.random() * colors.length)];
    $(this).css({'background-color': randomCol});
  }).mouseleave(function() {
    $(this).css({'background-color': 'white'});
  });

  $(document).on('click', '.reset-filter', function(ev) {
    location.reload();
  });

  // cosa posso fare
  $('.cpf-selector .button').click(function() {
    var linkToSection = $(this).attr('data-link');

    $('.cpf-selector .button').removeClass('active');
    $(this).addClass('active');

    $('.container-section').removeClass('active');
    $('#'+linkToSection).addClass('active');
  });

  // colored box
  $('.title-container').click(function() {
    var boxRole = $(this).attr('data-role');
    var currentBox = $(this).closest('.inner-box');
    var currentTxt = $(this).closest('.colored-box').find('.text-container[data-role~="'+boxRole+'"]');
    var currentTitle = $(this).closest('.colored-box').find('.title-container[data-role~="'+boxRole+'"]');
    // $('.colored-box .container').removeClass('active');
    currentTxt.addClass('active');
    currentTitle.addClass('active');

    if (!(mqMobile.matches)) {
      // double row case
      var background = $(this).closest('.container-fluid').find('.background[data-role~="'+boxRole+'"]');
      background.addClass('active');

      if (currentBox.siblings().size() > 0) {
        var sibling = currentBox.siblings();

        currentBox.addClass('d-whole');
        sibling.addClass('d-zero');
      }
    }
  });

  if (mqHoverDevices.matches) {
    $('.text-container .close').click(function() {
      var boxRole = $(this).closest('.text-container').attr('data-role');
      var currentBox = $(this).closest('.inner-box');
      var currentTxt = $(this).closest('.colored-box').find('.text-container[data-role~="'+boxRole+'"]');
      var currentTitle = $(this).closest('.colored-box').find('.title-container[data-role~="'+boxRole+'"]');
      var background = $(this).closest('.container-fluid').find('.background[data-role~="'+boxRole+'"]');

      currentTxt.removeClass('active');
      currentTitle.removeClass('active');
      background.removeClass('active');

      if (currentBox.siblings().size() > 0) {
        var sibling = currentBox.siblings();

        currentBox.removeClass('d-whole');
        sibling.removeClass('d-zero');
      }
    });
  } else {
    $('.text-content').click(function() {
      var boxRole = $(this).closest('.text-container').attr('data-role');
      var currentBox = $(this).closest('.inner-box');
      var currentTxt = $(this).closest('.colored-box').find('.text-container[data-role~="'+boxRole+'"]');
      var currentTitle = $(this).closest('.colored-box').find('.title-container[data-role~="'+boxRole+'"]');
      var background = $(this).closest('.container-fluid').find('.background[data-role~="'+boxRole+'"]');

      currentTxt.removeClass('active');
      currentTitle.removeClass('active');
      background.removeClass('active');

      if (currentBox.siblings().size() > 0) {
        var sibling = currentBox.siblings();

        currentBox.removeClass('d-whole');
        sibling.removeClass('d-zero');
      }
    });
  }

  if (mqMobile.matches) {
    $('.inner-box').each(function(i, el) {
      var color = $(el).attr('data-color');
      $(el).css('background-color', color);
    });
  }

  // ajax filters
  $('select').niceSelect();
  $(document).on('change', '#category-select, #theme-select, #date-select', function(ev) {
    ev.preventDefault();

    $('.posts-flow').addClass('hidden');

    var category = $('#category-select').find('select').attr('name');
    var catTerm = $('#category-select').find('li.selected').data('value');
    console.log(category);
    console.log(catTerm);

    var theme = $('#theme-select').find('select').attr('name');
    var themeTerm = $('#theme-select').find('li.selected').data('value');
    console.log(theme);
    console.log(themeTerm);
    
    var dateString =  $('#date-select').find('li.selected').data('value');

    if (dateString != '0') {
      var parts = dateString.split('/');
      var date = '';

      if (parts.length > 1) {
        date = parts[parts.length-2];
      }
      console.log(date);
    }

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: {action: 'filterCat', catTerm: catTerm, category: category, theme: theme, themeTerm: themeTerm, date: date},
      type: 'post',
      success: function(results) {
        $('.posts-flow').removeClass('hidden').html(results);
        createArchiveRows();
      },
      error: function(results) {
        console.log(results);
      }
    })
  });






//----------END JQUERY -----------
});
