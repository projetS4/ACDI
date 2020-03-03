<!-- file input -->
<script src="js/file-input.js"></script>

<!-- confirmer la supression -->
<script src="js/delete.js"></script>

<!-- slideshow -->
<script src="js/dots.js"></script>
<script src="js/slideshow.js"></script>
<script>
  $(function() {
    $(".update").click(function() {
      var $fieldset = $(this).parents("fieldset");
      var $slide = $(this).parents(".slide");

      var action = $fieldset.find("form").attr("action").replace("n=save","n=update");
      $fieldset.find("form").attr("action",action);

      // modifier un témoignage
      if($fieldset.is(".admin-testimonies")) {

        var id = $slide.attr("id").replace("testimonie-","");
        var param = "c=admin&a=inputTemoignages&id="+id;
        $fieldset.find(".load").load("index.php",param);

      } else { // autres
        if($fieldset.is(".admin-carousel")) {
          var id = $slide.attr("id").replace("slide-","");
          $fieldset.find("form").prepend('<input type="hidden" name="id" value="'+id+'"/>');
        } else {
          $fieldset.find("input.title").prop("readonly",true);
        }

        var $h2_fr = $slide.find("h2");
        var $h2_en;
        var title_fr = $h2_fr.text();
        var title_en;
        var link = $h2_fr.find("a").attr("href");
        if($slide.find("h2.en").length > 0) {
          $h2_fr = $slide.find("h2.fr");
          $h2_en = $slide.find("h2.en");
          title_fr = $h2_fr.text();
          title_en = $h2_en.text();
        }

        $fieldset.find("input.title:not(.en)").val(title_fr);
        $fieldset.find("input.title.en").val(title_en);

        $fieldset.find("input.link").val(link);
      }


      $fieldset.find('.update-exit').slideDown();
    });

    $('.update-exit button').click(function() {
      var $fieldset = $(this).parents("fieldset");
      var action = $fieldset.find("form").attr("action").replace("n=update","n=save");
      $fieldset.find("form").attr("action",action);

      $fieldset.find('.update-exit').slideUp();

      $fieldset.find('form input[type="hidden"]').remove();

      $fieldset.find("input.title").prop("readonly",false);

      $fieldset.find("form input, form textarea").val("");
    });

    $(".admin-map select").change(function() {
      if($(this).val() != "-1") {
        $(this).parents(".map-fieldset").find('[name="nom"]').val($(this).val());
      } else {
        $(this).parents(".map-fieldset").find('[name="nom"]').val("");
      }
    });

    $(".admin-map [type='radio']").change(function() {
      var clss = $(this).attr("class");
      var action = clss.replace("choix-","")
      var $div_select = $(this).parents(".choix").find(".choix-select");
      var $form = $(this).parents(".map-fieldset").find("form");

      $form.find('[name="action"]').val(action);

      if(clss == "choix-modifier" || clss == "choix-supprimer") {
        $div_select.slideDown();
      } else {
        $div_select.slideUp();
        $form.find('[name="nom"]').val("");
      }

      if(clss == "choix-supprimer") {
        $(this).parents(".map-fieldset").find(".form-content").slideUp();
      } else {
        $(this).parents(".map-fieldset").find(".form-content").slideDown();
      }
    });

    $(".add-btn").click(function() {
      $(".resp").eq(0).after("<div class='resp'>"+$(".resp").html()+"</div>");
    });

    $(document).on("click", ".delete-btn", function() {
      $(this).parents(".resp").remove();
    });
  });
</script>
