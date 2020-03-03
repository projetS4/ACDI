$(function() {
  $(".delete").click(function(e) {
    var answer = confirm("La suppression sera irréversible. Souhaitez-vous poursuivre ?");
    if(!answer) e.preventDefault();
  });
});
