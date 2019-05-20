$('#dismiss, .overlay').on('click', function () {
  $('#mainNav').toggleClass('nav-transparent');
  $('#sidebar').removeClass('active');
  $('.overlay').removeClass('active');
});

$('#sidebarCollapse').click(function(){
  $('#mainNav').toggleClass('nav-transparent');
  $('#sidebar').toggleClass('active');
  $('.overlay').toggleClass('active');
  $('.collapse.in').toggleClass('in');
  $('a[aria-expanded=true]').attr('aria-expanded', 'false');
});
