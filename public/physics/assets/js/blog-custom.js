// Student Review Slider 
jQuery(document).ready(function($) {
            "use strict";
            //  review CAROUSEL HOOK
            $('#student-review').owlCarousel({
                loop: true,
                center: true,
                items: 3,
                margin: 0,
                autoplay: true,
                dots:true,
                autoplayTimeout: 1500,
                smartSpeed: 450,
                responsive: {
                  0: {
                    items: 1
                  },
                  768: {
                    items: 2
                  },
                  1170: {
                    items: 3
                  }
                }
            });
          });
  


  

// ****************Blog Page Small Slider Nested Into Big Slider*************************************

      $('#mySlide1').slick({
        dots: true,
        autoplay: true,
        infinite: true,
        slidesToShow: 4,
        centerMode: false,
        vertical: false,
        arrows: false,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 500,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          ]
      });

      