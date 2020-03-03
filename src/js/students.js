// récupérer le nombre total d'articles
var nb_articles = $("#students article").length;

// lors d'un clic sur le bouton < ou >
$("#students button").click(function(){
  // récupérer le bouton sélectionné
  var val = $(this).attr("class");

  // récupérer l'index de l'article actuellement affiché
  var cur = $("#students article:visible").index() - 1; // (-1 afin d'ignorer l'élément <nav>)

  // masquer tous les articles
  $("#students article").removeClass("current");
  $("#students article").hide();

  // si le bouton sélectionné est "next" : ajouter +1 à l'index ; sinon enlever -1
  cur = (val == "next") ? cur+1 : cur-1;

  // si l'index de l'article demandé dépasse le nombre total d'articles
  if(cur >= nb_articles) cur = 0; // se positionner au début

  // si l'index de l'article demandé est négatif
  if(cur < 0) cur = nb_articles-1; // se positionner à la fin

  // afficher l'article demandé
  $("#students article").eq(cur).addClass("current");
  $("#students article").eq(cur).fadeIn();
});
