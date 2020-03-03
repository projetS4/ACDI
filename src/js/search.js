// lors d'un clique
$(document).click(function(event){
  form = '#header form';
  $form = $(form);

  // si on clique en dehors du form
  if(!$(event.target).closest(form).length) {
      if($form.is(".focus")) {
          $form.removeClass("focus");  // réatbblir la couleur du fond
      }
  }
  // si on clique sur le form
  else {
    $form.addClass("focus"); // changer la couleur du fond
  }
});
