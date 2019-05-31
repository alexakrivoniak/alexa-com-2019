jQuery(document).ready(function($) {
	initGoogleFonts();
    if(jQuery('body').hasClass('home')) {
      navigation();
      heroBanner();
      portfolioItems();
      aboutSectionWaypoints();
      squareSectionAreas();

      addActiveForm($('.contact-form-area input'));
      addActiveForm($('.contact-form-area textarea'));
    }
    //Retina.init();

    function navigation() {
        $('.menu-toggle').click(function() {
            if(!$('.menu-toggle').hasClass('menu-open')) {
                $('.menu-toggle').addClass('menu-open');
                $('.main-nav-list').addClass('menu-open');
            } else {
                $('.menu-toggle').removeClass('menu-open');
                $('.main-nav-list').removeClass('menu-open');
            }
        });

        $('.hero-banner-nav-link').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });

        $('.main-nav-link').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                $('.menu-toggle').removeClass('menu-open');
                $('.main-nav-list').removeClass('menu-open');
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
    }

    function heroBanner() {
        var headerWaypoint = new Waypoint({
          element: document.getElementById('hero-banner-waypoint'),
          handler: function(direction) {
            if(direction == 'down') {
                if(!$('header').hasClass('animate')) {
                    $('header').addClass('animate');
                }
            } else if (direction == 'up') {
                if($('header').hasClass('animate')) {
                   $('header').removeClass('animate');
                }
            } 
          }, offset: '-20px'
        });

        var headerWaypoint = new Waypoint({
          element: document.getElementById('work-section'),
          handler: function(direction) {
            if(direction == 'down') {
                if(!$('header').hasClass('add-menu')) {
                    $('header').addClass('add-menu');
                }
            } else if (direction == 'up') {
                if($('header').hasClass('add-menu')) {
                   $('header').removeClass('add-menu');
                }
            } 
          }, offset: '20px'
        });
    }

    function portfolioItems() {
    	$('.portfolio-item-row').click(function(){
    		if(!$(this).hasClass('active')) {
    			$(this).addClass('active');
                $(this).siblings().removeClass('active');

                $('html, body').animate({
                    scrollTop: $(this).offset().top - 50
                }, 1200);
                Waypoint.refreshAll(); 
    		} else {
    			$(this).removeClass('active');
                Waypoint.refreshAll();
    		}
    	});

        $('.portfolio-item-wrap').each(function() {
            var heightOfContent = $(this).children('.portfolio-main-content').height() + 20;
            $(this).children('.portfolio-feature-img').css('height', heightOfContent);
        });
    }

    function aboutSectionWaypoints() {
        if(jQuery(window).width() > 734) {
            var topAboutwaypoint = new Waypoint({
              element: document.getElementById('about-section'),
              handler: function(direction) {
                if(direction == 'down') {
                    if(!$('.about-section').hasClass('fixed')) {
                        $('.about-section').addClass('fixed');
                        $('.about-section').addClass('add-title');
                    }
                } else if (direction == 'up') {
                    if($('.about-section').hasClass('fixed')) {
                       $('.about-section').removeClass('fixed');
                    }
                } 
              }
            });

            var bottomAboutwaypoint = new Waypoint({
              element: document.getElementById('about-content-bottom'),
              handler: function(direction) {
               if(direction == 'down') {
                     $('.about-section').removeClass('fixed');
                } else if (direction == 'up') {
                   $('.about-section').addClass('fixed');
                } 
              }, offset: 'bottom-in-view'
            });
        } else {
            $('.about-section').addClass('mobile');
        }
    }

    function initGoogleFonts() {
    	WebFontConfig = {
		    google: { families: [ 'Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic:latin', 'Dosis:400,300,200,500,600,700,800:latin' ] }
		  };
		  (function() {
		    var wf = document.createElement('script');
		    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		    wf.type = 'text/javascript';
		    wf.async = 'true';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(wf, s);
		  })();
    }

    function addActiveForm(inputs) {
        $(inputs).each(function(){
            $(this).focus(function(){
                $(this).addClass("active");
                $(this).parent().addClass("active");
                $(this).siblings("label").addClass("active");
            });
            $(this).blur(function(){
                $(this).removeClass('active');
                $(this).parent().removeClass("active");
                if($(this).val() === '' || $(this).val() === 'blank'){
                    $(this).siblings("label").removeClass('active');
                } else {
                    $(this).parent().addClass("has-content");
                }
            });
        });
    }

    function squareSectionAreas() {
      function equalHeights(group) {
        tallest = 0;
        group.each(function() {
            thisHeight = jQuery(this).height();
            if(thisHeight > tallest) {
                tallest = thisHeight;
            }
        });
        group.height(tallest);
      }

      if(jQuery('.about-section').length > 0 && jQuery(window).width() > 480) {
        equalHeights(jQuery('.about-section .container-fluid .col-m-6 > div'));
      }
    }

    function sticky_relocate() {
      var window_top = $(window).scrollTop();
      var div_top = $('#content-anchor').offset().top;
      if (window_top > div_top) {
        $('.gg-subheader').addClass('stick');
        $('.gg-subheader-phantom').show();
      } else {
        $('.gg-subheader').removeClass('stick');
        $('.gg-subheader-phantom').hide();
      }
    }

    if(jQuery('body').hasClass('page-template-gwens-girls')) {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top - 160
            }, 1000);
            return false;
          }
        }
      });

      $(window).scroll(sticky_relocate);
      sticky_relocate();
    }
});