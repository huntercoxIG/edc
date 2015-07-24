/**************************************************************
 * Filename: site.js
 * Description: Primary javascript file for EDC Wayne County
 *              Web site.
 * Author: Shaun Lieberman
 * Company: Huffine Design, Inc.
 * Created: 7/15/2009
 **************************************************************/

jQuery(function($) {

// Workaround to show active page on Blog listings with variant page name
  $(document).ready(function() {
    var url = location.pathname;
    if (url.indexOf('open-lines') > -1 || url.indexOf('presidents-desk') > -1 || url.indexOf('news-releases') > -1) {
      $('#hd div.nav>ul li a[href*="/media-communications/"]:first').parent().addClass('current_page_item');
    };
  });
  
// Change class name on resize based on resolution
$(window).resize(function(){
   console.log('resize called');
   var width = $(window).width();
   if(width <= 1027){
       $('.nav').removeClass('nav').addClass('m_nav');
   }
   else{
       $('.m_nav').removeClass('m_nav').addClass('nav');
   }
})
.resize();//trigger the resize event on page load.

// Mobile Menu accordion control
    $(function () {
        var MMenu = $('.m_nav>ul');
        // Initial Setup and Rendering
        MMenu.find('ul').hide();    
        MMenu.find('li').has('ul').addClass('parent'); 
        
        MMenu.children('li.parent').children('a').append('<span></span>');
        MMenu.children('li.parent').children('ul').children('li.parent').children('a').append('<span></span>'); 
        MMenu.find('li.selected').addClass('open'); 
        MMenu.children('li.selected').children('ul').show();    
        MMenu.children('li.selected').children('ul').children('li.selected').children('ul').show();
        
        //Bind 'li.parent a span' to click to open dropdown and prevent default
        MMenu.find('a span').click(function(){
            $(this).parent().siblings('ul').slideToggle('fast');
            $(this).parent().parent().toggleClass('open');
            return false;
        });
        
    });

  // Set up menu stuff
  $('ul.subnav', '#nav').css('display', 'none');
  $('#nav li').hover(
    function(e) {
      if (!$(this).hasClass($('#pg').attr('class'))) {
        $('ul.subnav', this).fadeIn('fast');
      }
    },
    function(e) {
      $('ul.subnav', this).fadeOut('fast');
    }
  );

  // Show broken links
  $('a[href=""]').hover(
    function(e) {
      $(this).css('text-decoration', 'line-through');
    },
    function(e) {
      $(this).css('text-decoration', '');
    }
  );

  // Set up smooth scrollers
  $('a.smooth-scroll, .smooth-scroll a').click(function(){
    var href = $(this).attr('href');
    if (href.substr(0, 1) != '#') {
      return true;
    }

    $('html, body').animate({
      scrollTop: $(href).offset().top
    }, 750);
    return false;
  });


  // Set up the search box
  $('#search-form #submit-input').hide();
  $('#search-form #query-input')
    .css({paddingRight: '5px', width: '190px', textAlign: 'right', color: '#aaa'})
    .attr('value', 'search')
    .focus(function(){
      if ($(this).attr('value') == 'search' && $(this).css('text-align') == 'right' ) {
        $(this).attr('value', '').css({textAlign: 'left', color: ''});
      }
    })
    .blur(function(){
      if ($(this).attr('value') == '') {
        $(this).attr('value', 'search').css({textAlign: 'right', color: '#aaa'});
      }
    })


  // Handle AJAX form for TIA
  $('#submit-tia').click(function() {
    $('#tiaForm td.error').html('');

    $.ajax({
      type: 'POST',
      url: $('#tiaForm').attr('action'),
      data: $('#tiaForm').serialize(),
      dataType: 'json',
      success: function(response) {
        if (response.status == 'success') {
          $('form').addClass('successful-post');
          $('.hidden').fadeIn('slow');
        }
        else {
          $.each(response.fieldErrors, function(field, errors) {
            $.each(errors, function(key, val) {
              $('.error.' + field).append('<div>' + val + '</div>');
            });
          });
        }
      }
    });

    return false;
  });

  // Set up slideshow
  if ($('.home')[0]) {
    var $slideshow = $('#slideshow');

    $slideshow.rsfSlideshow({
      interval: 6,
      controls: {
        previousSlide: {
          auto: true,
          place: function($slideshow, $control) {
            $slideshow.append($control);
          }
        },
        nextSlide: {
          auto: true,
          place: function($slideshow, $control) {
            $slideshow.append($control);
          }
        }
      },
      autostart: false
    }).hover(function() {
      $('.rs-prev, .rs-next').fadeIn('fast');
    }, function() {
      $('.rs-prev, .rs-next').fadeOut('fast');
    });

    window.setTimeout(function() {
      $slideshow.rsfSlideshow('startShow');
    }, 3000);
  }


});

