/*=== Javascript function indexing hear===========

1.counterUp ----------(Its use for counting number)
2.stickyHeader -------(header class sticky)
3.wowActive ----------( Waw js plugins activation)
4.swiperJs -----------(All swiper in this website hear)
5.salActive ----------(Sal animation for card and all text)
6.textChanger --------(Text flip for banner section)
7.timeLine -----------(History Time line)
8.datePicker ---------(On click date calender)
10.timeLineStory -----(History page time line)
11.vedioActivation----(Vedio activation)
12.searchOption ------(search open)
13.cartBarshow -------(Cart sode bar)
14.sideMenu ----------(Open side menu for desktop)
15.Back to top -------(back to top)
16.filterPrice -------(Price filtering)

==================================================*/

(function ($) {
    'use strict';

    var imJs = {
        m: function (e) {
            imJs.d();
            imJs.methods();
        },
        d: function (e) {
            this._window = $(window),
            this._document = $(document),
            this._body = $('body'),
            this._html = $('html')
        },
        methods: function (e) {
            imJs.stickyHeader();
            imJs.swiperJs();
            imJs.salActive();
            imJs.metismenu();
            imJs.sideMenu();
            imJs.backToTopInit();
            imJs.slideNav();
            imJs.onePageNav();
        },
        // sticky header activation
        stickyHeader: function (e) {
          $(window).scroll(function () {
              if ($(this).scrollTop() > 150) {
                  $('.header--sticky').addClass('sticky')
              } else {
                  $('.header--sticky').removeClass('sticky')
              }
          })
        },
        // All swiper js
        swiperJs: function () {
            $(document).ready(function () {
                var menu = ['Design and Build', 'Roof Remodeling', 'Bridge Remodeling']
                var mySwiper = new Swiper ('.swiper-container', {
                    // If we need pagination
                    effect: 'fade',
                    loop:true,
                    pagination: {
                      el: '.swiper-pagination',
                            clickable: true,
                    },
                    autoplay: {
                        delay: 7000,
                    },
                    // Navigation arrows
                    navigation: false,
                })
            });
            $(document).ready(function () {
                var mySwiper = new Swiper ('.swiper-container-h2', {
                    // If we need pagination
                    effect: 'slide',
                    loop:true,
                    pagination: {
                      el: '.swiper-pagination',
                            clickable: true,
                    },
                    autoplay: {
                        delay: 7000,
                    },
                    // Navigation arrows
                    navigation: false,
                })
            });

            $(document).ready(function () {
                var swiper = new Swiper(".case-three", {
                  slidesPerView: 2.1,
                  spaceBetween: 30,
                  slidesPerGroup: 1,
                  centeredSlides: true,
                  parallax: true,
                  loop: true,
                  autoplay: {
                    delay: 3000,
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 3,
                    },
                    1199: {
                      slidesPerView: 3,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
                var swiper = new Swiper(".swiper-container-h1", {
                  direction: "horizontal",
                  effect: "slide",
                  autoplay: false,
                  parallax: true,
                  speed: 1600,
                  rtl: true,
                  loop: true,
                  loopFillGroupWithBlank: !0,
                  keyboard: {
                    enabled: true,
                    onlyInViewport: true
                  },
                  scrollbar: {
                    el: ".swiper-scrollbar",
                    hide: false,
                    draggable: true
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  pagination: {
                      el: ".swiper-pagination",
                      type: "bullets",
                      clickable:"true"
                    }
                });
            });

            $(document).ready(function () {
                var swiper = new Swiper(".rts-team-slider", {
                  slidesPerView: 2,
                  spaceBetween: 30,
                  slidesPerGroup: 1,
                  centeredSlides: false,
                  speed: 1600,
                  loop: true,
                  autoplay: {
                    delay: 3000,
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-nexts",
                    prevEl: ".swiper-button-prevs",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 2,
                    },
                    1199: {
                      slidesPerView: 2,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".rts-team-slider2", {
                  slidesPerView: 4,
                  spaceBetween: 30,
                  slidesPerGroup: 1,
                  centeredSlides: false,
                  speed: 1600,
                  loop: true,
                  autoplay: {
                    delay: 3000,
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-nexts",
                    prevEl: ".swiper-button-prevs",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 4,
                    },
                    1199: {
                      slidesPerView: 3,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });

            $(document).ready(function () {
                var swiper = new Swiper(".project-home-nine", {
                  slidesPerView: 3,
                  spaceBetween: 30,
                  slidesPerGroup: 1,
                  centeredSlides: true,
                  loop: true,
                  autoplay: {
                    delay: 3000,
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 3,
                    },
                    1199: {
                      slidesPerView: 3,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });

            $(document).ready(function () {
                var swiper = new Swiper(".mySwiper-blog", {
                  slidesPerView: 3,
                  spaceBetween: 30,
                  loop: false,
                  autoplay: false,
                  pagination: false,
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 3,
                    },
                    1199: {
                      slidesPerView: 2,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".mySwiper-brand", {
                  slidesPerView: 5,
                  spaceBetween: 30,
                  loop: true,
                  autoplay: false,
                  pagination: false,
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 5,
                    },
                    1199: {
                      slidesPerView: 5,
                    },
                    991: {
                      slidesPerView: 3,
                    },
                    767: {
                      slidesPerView: 2,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".service-six", {
                  slidesPerView: 3,
                  spaceBetween: 30,
                  loop: true,
                  // autoplay: {
                  //   delay: 3000,
                  // },
                  pagination: {
                    el: '.swiper-pagination',
                          clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 3,
                    },
                    1199: {
                      slidesPerView: 2,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".case-tab-swipers", {
                  slidesPerView: 2.4,
                  spaceBetween: 30,
                  slidesPerGroup: 1,
                  centeredSlides: true,
                  loop: true,
                  autoplay: {
                    delay: 3000,
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-paginations",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 3,
                    },
                    1199: {
                      slidesPerView: 3,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".swiper-vision", {
                  direction: "horizontal",
                  effect: "slide",
                  parallax: true,
                  speed: 1600,
                  slidesPerView: 1,
                  spaceBetween: 0,
                  slidesPerGroup: 1,
                  centeredSlides: true,
                  loop: true,
                  autoplay: false,
                  keyboard: {
                    enabled: true,
                    onlyInViewport: true
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    autoplay: false,
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".swiper-testimonials-1", {
                  slidesPerView: 2,
                  slidesPerGroup: 1,
                  parallax: true,
                  speed: 1600,
                  centeredSlides: true,
                  loop: true,
                  autoplay: {
                    delay: 3000,
                  },
                  breakpoints: {
                    1500: {
                      slidesPerView: 2,
                    },
                    1199: {
                      slidesPerView: 2,
                    },
                    991: {
                      slidesPerView: 2,
                    },
                    767: {
                      slidesPerView: 1,
                    },
                    575: {
                      slidesPerView: 1,
                    },
                    0: {
                      slidesPerView: 1,
                    }
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-paginations",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                });
            });
            $(document).ready(function () {
                var swiper = new Swiper(".swiper-banner-eight", {
                  slidesPerView: 1,
                  spaceBetween: 0,
                  slidesPerGroup: 1,
                  centeredSlides: true,
                  loop: true,
                  autoplay: {
                    delay: 7000,
                  },
                  loopFillGroupWithBlank: true,
                  pagination: {
                    el: ".swiper-paginations",
                    clickable: true,
                  },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                });
            });

        },
        // sal animatioin activation
        salActive: function () {
          sal({
              threshold: 0.1,
              once: true,
          });
        },
        // metismenu
        metismenu:function(){
          $('#mobile-menu-active').metisMenu();
        },
        // side menu desktop
        sideMenu:function(){
          $(document).on('click', '#menu-btn', function () {
            $("#side-bar").addClass("show");
            $("#anywhere-home").addClass("bgshow");
          });
          $(document).on('click', '.close-icon-menu', function () {
            $("#side-bar").removeClass("show");
            $("#anywhere-home").removeClass("bgshow");
          });
          $(document).on('click', '#anywhere-home', function () {
            $("#side-bar").removeClass("show");
            $("#anywhere-home").removeClass("bgshow");
          });
          $(document).on('click', '.onepage .mainmenu li a', function () {
            $("#side-bar").removeClass("show");
            $("#anywhere-home").removeClass("bgshow");
          });
        },

        slideNav: function () {
          window.slide = new SlideNav();
        },

        onePageNav: function (e) {
          $(document).ready(function() {
            var nav = $('#nav');
            if(nav.length){
              $('#nav').onePageNav();
            }
          });
        },

        backToTopInit: function () {
          $(document).ready(function(){
          "use strict";

          var progressPath = document.querySelector('.progress-wrap path');
          var pathLength = progressPath.getTotalLength();
          progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
          progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
          progressPath.style.strokeDashoffset = pathLength;
          progressPath.getBoundingClientRect();
          progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
          var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
          }
          updateProgress();
          $(window).scroll(updateProgress);
          var offset = 50;
          var duration = 550;
          jQuery(window).on('scroll', function() {
            if (jQuery(this).scrollTop() > offset) {
              jQuery('.progress-wrap').addClass('active-progress');
            } else {
              jQuery('.progress-wrap').removeClass('active-progress');
            }
          });
          jQuery('.progress-wrap').on('click', function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
          })


        });
        },
    }

    imJs.m();
  })(jQuery, window)
