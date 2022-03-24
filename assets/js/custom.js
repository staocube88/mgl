/*

  Author: DeMustang
  Template: Massketing
  Version: 2.0
  URL: http://themeforest.net/user/demustang


*/
	
	
	$(document).ready(function() { // Document ready
	"use strict";
	
	/* ==========================
	   PRE-LOADER
	=============================*/
	
	$(window).load(function() {
		// will fade loading animation
		$("#object").delay(600).fadeOut(300);
		// will fade loading background					
		$("#loading").delay(1000).fadeOut(500);
	})           
    
	/* ==========================
	   Anchor Scroll
	=============================*/  
     $(function() {
            $('a.scroll').on('click', function(event) {
              var $anchor = $(this);
              $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 0
              }, 2000, 'easeInOutExpo');
              event.preventDefault();
            });
          });

	/* =====================================
	   SUBSCRIBE ( NEWSLETTER SUBSCRIPTION )
	========================================*/

	$.validator.setDefaults({
		submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"inc/subscribe.php",
                success: function() {
                   // alert('success');
                   $('#newsletter-error').slideUp();
                   $('#newsletter-success').slideDown();
                },
                error: function() {
                    //alert('error');

                    $('#newsletter-success').slideUp();
                    $('#newsletter-error').slideDown();
                    
                }
            });
        }
	});

	$().ready(function() {
        var container = $('#newsletter-error');
		// validate the form when it is submitted
		var validator = $("#subscribe").validate({
            invalidHandler: function() {
                $('#newsletter-success').slideUp();
                $("#newsletter-error").slideDown();
            },
            errorPlacement: function(error, element) { 
                $('#validation_error').html(error.text());                
            }

		});

		
	});
	/* =====================================
	   ScrollReveal
	========================================*/
	 window.sr = ScrollReveal();

      sr.reveal('.reveal-bottom', {
        origin: 'bottom',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-top', {
        origin: 'top',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-left', {
        origin: 'left',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-right', {
        origin: 'right',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });
        
      sr.reveal('.reveal-left-fade', {
        origin: 'left',
        distance: '20px',
        duration: 800,
        delay: 0,
        opacity: 0,
        scale: 0,
        easing: 'linear',
        mobile: false
      });

      sr.reveal('.reveal-right-fade', {
        origin: 'right',
        distance: '20px',
        duration: 800,
        delay: 0,
        opacity: 0,
        scale: 0,
        easing: 'linear',
        mobile: false
      });
        
      sr.reveal('.reveal-right-delay', {
        origin: 'right',
        distance: '20px',
        duration: 1000,
        delay: 0,
        opacity: 0,
        scale: 0,
        easing: 'linear',
        mobile: false
      }, 500);
        
      sr.reveal('.reveal-bottom-fade', {
        origin: 'bottom',
        distance: '20px',
        duration: 800,
        delay: 0,
        opacity: 0,
        scale: 0,
        easing: 'linear',
        mobile: false
      });
      
	
	}); // End document ready