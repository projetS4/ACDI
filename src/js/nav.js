// navigation principale

// Barre de navigation qui reste fixée en haut de la page
$(document).ready(function () {
  var lastScrollTop = 0;
  var num = $('#header').height();
  var $nav = $('#navigation .menu--normal');
  var navHeight = $nav.height();
  var navWidth = $(".content").width();

  if(navHeight == 0) navHeight = "auto";
  if(navWidth == 0) navWidth = "100%";

  sizeNav($nav, navWidth, navHeight);
  $(window).on('resize', function() { sizeNav($nav, navWidth, navHeight); });

  $(".content-wrap").scroll(function(){

    if($('#navigation .menu--burger').is(":hidden")) {

      $nav = $('#navigation .menu--normal');
      var st = $(this).scrollTop();

      if (st > num) {

        if (st > lastScrollTop && $nav.is(":visible")){ // downscroll
          if(st > navHeight+num) {
            $nav.slideUp();
          }
        } else if (st < lastScrollTop && $nav.is(":hidden")){ // upscroll
          $nav.addClass('fixed');
          $nav.slideDown();
        }
      } else {
       $nav.removeClass('fixed');
       $nav.slideDown();
      }
      lastScrollTop = st;

    }

  });

  function sizeNav($nav, navWidth, navHeight) {
    if($('#navigation .menu--burger').is(":hidden")) {
      $nav.css("width",navWidth);
      $('#navigation').css("height",navHeight);
    } else {
      $('#navigation').css("height","auto");
    }
  }
});

// lorsqu'on passe le curseur sur une rubrique
$("#navigation ul > li, nav.menu  ul > li").mouseover(function(){
  $(this).find("ul").slideDown("fast"); // dérouler les sous-rubriques
});

// Pour le menu normal, le lien des rubrique change de couleur
$(".menu--normal > ul > li").mouseover(function(){
  $(this).children("a").addClass("hover"); // changer la couleur du lien
});

// lorsque le curseur ne survol plus les rubriques
$("#navigation ul > li, nav.menu ul > li").mouseleave(function(){
  $(this).find("ul").stop(true, true).slideUp("fast"); // faire disparaître les sous-rubriques
  $(this).find("a").removeClass("hover"); // rétablir la couleur du lien
});
