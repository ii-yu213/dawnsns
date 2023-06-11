

$(function accordion() {
  $("#account").on("click", function () {
    $('ul').slideToggle();
  });
});




$(function () {
  $('.modal-open').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });
});
