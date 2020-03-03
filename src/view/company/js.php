<!-- file input -->
<script src="js/file-input.js"></script>
<script>
  $( function() {
    $(".select-add").click(function() {
      var html = $(".form-select div:last-of-type").html();
      $(".form-select div:last-of-type").after("<div>"+html+"</div>");
    });

    $(document).on("click", ".select-delete",function() {
      $(this).parent().remove();
    });
  });
</script>
