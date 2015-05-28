// ==== CORE ==== //

// A simple wrapper for all your custom jQuery; everything in this file will be run on every page
;(function($){
  $(function(){
    $('.banner').unslider({
      keys: true,
      dots: true,
      arrows: true,
      fluid: true
    });
  });
}(jQuery));
