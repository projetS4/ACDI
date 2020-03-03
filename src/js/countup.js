$(function(){

var d = 1000; // durée totale de l'animation (en millisecondes)

// Lors du scroll de la page
$(".content-wrap").scroll(function() {

  // ne lancer le compteur que s'il est à 0
  // (sinon, cela signifie qu'il a déjà été lancé et on ne veut pas le recommencer)
  if($(".counter").eq(0).text() == 0) {

    // position du scroll par rapport au haut de la page
    var scrollOffset = $(".content-wrap").scrollTop();

    // position de l'élément #numbers par rapport au haut de la page
    var containerOffset = $('#numbers').offset().top - window.innerHeight;

    // Si l'élément #numbers est visible
    if (scrollOffset > containerOffset) {

      // commencer le compteur pour chaque élément .counter (pour chaque nombre)
      $(".counter").each(function() {
          countUp($(this), d);
      });

    }

  }

});


// fonction du compteur
function countUp($this, duration) {
  // récupérer le nombre final que doit atteindre le compteur
  var max = parseInt($this.attr("data-count"));

  // initialisation du compteur à 0
  var x = 0;

  // si les nombres sont très grands, initialiser le compteur à un nombre déjà élevé
  // pour que l'animation ne prenne pas trop de temps
  if(max > 500) x = parseInt((max * 50)/100); // plus de 500, commencer à 50% du nombre
  if(max > 1000) x = parseInt((max * 85)/100); // plus de 1000, commencer à 90% du nombre
  if(max > 5000) x = parseInt((max * 95)/100); // plus de 1000, commencer à 90% du nombre

  // Toutes les (duration/max) millisecondes
  var time_id = setInterval(function() {
    x++; // incrémenter le compteur
    $this.text(x); // afficher x sur la page
    if (x == max) { // si le compteur est terminé
      clearInterval(time_id); // on arrête le processus d'incrémentation
    }
  }, duration/max);
}

});
