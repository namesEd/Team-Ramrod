

$(document).ready(function() {
//  https://codepen.io/richerimage/pen/jEXWWG
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww <= 562) {
       $('.card').addClass('overflow-scroll');
         $('.card').removeClass('overflow-hidden');
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});