$(function() {
	var $up = $('#go-up');
	var $button = $up.find("button");

	// Afficher le bouton lorsqu'on est assez bas dans la page
	$(".content-wrap").scroll(function() {
		if ($(this).scrollTop() >= $(this).height() && $(this).scrollTop() < $("main").height()+$("header").height()+200) {
			$up.fadeIn(); // Afficher
		} else {
			$up.fadeOut(); // Retirer
		}
	});

	// retour en haut
	$button.click(function(){
		$(".content-wrap").animate({scrollTop:0}, 'slow');
		return false;
	});
});
