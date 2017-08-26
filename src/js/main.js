/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, Modernizr, Swiper */

Site = {
  mobileThreshold: 601,
  init: function() {
    var _this = this;

    $(window).resize(function(){
      _this.onResize();
    });

    $(document).ready(function () {
      if ($('.swiper-container').length) {
        Site.Gallery.init();
      }

    });

  },

  onResize: function() {
    var _this = this;

  },

  fixWidows: function() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  },
};

Site.Gallery = {
  init: function() {
    var _this = this;

    if ($('#slider-holder-install').length) {
      _this.initSwiper('install');
    }
    if ($('#slider-holder-works').length) {
      _this.initSwiper('works');
    }

    _this.bindSwitch();
  },

  initSwiper: function(type) {
    var _this = this;

    new Swiper ('#swiper-' + type, {
      loop: true,
      slidesPerView: 'auto',
      loopedSlides: 5,
      spaceBetween: 0,
      centeredSlides: true,
      slideToClickedSlide: true,
      nextButton: '.slider-next-' + type,
      prevButton: '.slider-prev-' + type,
      onTap: function(swiper) {
        swiper.slideNext();
      },
      onInit: function(swiper) {
        _this.updateCaption(swiper.realIndex);
      },
      onSlideChangeEnd: function(swiper) {
        _this.updateCaption(swiper.realIndex);
      },
    });
  },

  updateCaption: function(activeIndex) {
    // Update caption in slider control row
    // from '.slide-caption' elem in active slide
    var caption = $('.slider-holder.active .swiper-slide[data-swiper-slide-index="' + activeIndex + '"] .slide-caption').html();

    if (!caption) {
      caption = '';
    }

    $('.slider-controls-caption').html(caption);
  },

  bindSwitch: function() {
    // Bind 'Installation View' / 'Works' slider toggle
    $('.slider-switch').on('click', function() {
      if (!$(this).hasClass('.active')) {
        var type = $(this).attr('data-target');

        $('.slider-switch, .slider-holder, .slider-buttons').removeClass('active');
        $(this).addClass('active');
        $('#slider-holder-' + type + ', #slider-buttons-' + type).addClass('active');
      } else {
        return;
      }
    });
  }
};

Site.init();
