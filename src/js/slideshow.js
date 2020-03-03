// animation des puces
[].slice.call( document.querySelectorAll( '.dotstyle > ul' ) ).forEach( function( nav ) {
  new DotNav( nav, {
    callback : function( idx ) {
      //console.log( idx )
    }
  } );
} );

// lors d'un clic sur une puce
$(".slideshow nav button").click(function(){
  // récupérer l'index du slide demandé
  var index = $(this).parent().index();

  // récupérer l'id du carrousel
  // (s'il existe plusieurs carrousel sur la page)
  var id = $(this).parents(".slideshow").attr("id");

  // afficher le slide demandé
  slide(index,id);
});

// slide automatique
// Toutes les 10 000mms (= 1 sec)
if($("#slideshow").length) { // s'il s'agit bien du carrousel de la page d'accueil, on peut lancer l'animation
  setInterval(function() {
    // récupérer l'index du slide actuellement affiché
    var index = $("#slideshow .slide.current").index();
    var id = "slideshow"; // id du carrousel

    // afficher le slide suivant
    slide(index+1, id);
  }, 10000);
}

// lorsque une touche du clavier est pressée
$(document).keydown(function(e){

  // récupérer l'index du slide actuellement affiché
  var cur = $("#slideshow .slide.current").index();
  var id = "slideshow"; // id du diaporama (celui qui se situe uniquement sur la page d'accueil)

  // actions en fonction de la touche pressée :
  switch(e.which) {
    case 37: // flèche gauche
      slide(cur-1, id); // afficher le slide précédent
    break;

    case 39: // flèche droite
      slide(cur+1, id); // afficher le slide suivant
    break;

    // quitter la boucle si la touche pressée ne nous intéresse pas
    default: return;
  }

  // empêcher l'action par défaut de la touche pressée
  e.preventDefault();
});

// fonction du carrousel
// action : affiche le slide demandé par son index sur le carrousel id
// paramètres : index, le numéro du slide demandé ; id, l'identifiant du carrousel
// (au cas où il y en aurait plusieurs sur la même page)
function slide(index, id) {
  // récupérer le bon carrousel grâce à son id
  var $slideshow = $("#"+id);

  // récupérer le nombre total de slides
  var nb_slides = $slideshow.find("nav li").length;

  // récupérer l'index du slide actuellement affiché
  var cur = $slideshow.find(".slide.current").index();

  // si l'index du slide demandé dépasse le nombre total de slides
  if(index >= nb_slides)
    slide(0, id); // afficher le premier slide

  // si l'index du slide demandé est négatif
  else if(index < 0)
      slide(nb_slides-1, id); // afficher le dernier slide

  // si le slide demandé n'est pas déjà affiché
  else if(cur != index) {
    // masquer le slide courant
    $slideshow.find(".slide.current").fadeOut();
    // retirer la classe .current du slide et de la puce
    $slideshow.find(".slide").removeClass("current");
    $slideshow.find("nav li.current").removeClass("current");

    // afficher le slide demandé
    $slideshow.find(".slide").eq(index).fadeIn();
    $slideshow.find(".slide").eq(index).css("display","flex"); // forcer le display:flex sinon il ne se met pas
    // ajouter la classe .current au slide demandé et à la puce qui lui correspond
    $slideshow.find(".slide").eq(index).addClass("current");
    $slideshow.find("nav li").eq(index).addClass("current");
  }
}
