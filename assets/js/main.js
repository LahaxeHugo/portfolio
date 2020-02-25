$(function() {

  $(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: $($.attr(this, 'href')).offset().top-130}, 800);
    $('#main-menu').removeClass('main-menu-selected');
  });
})

$('.menu-toggle').on('click', function() {
	$('#main-menu').addClass('main-menu-selected');
});
$('.burger-breads.close').on('click', function() {
	$('#main-menu').removeClass('main-menu-selected');
});