$(document).ready(function() {
  // form animation
  $('input').each(function() {

    $(this).on('focus', function() {
      $(this).parent('.css').addClass('active');
    });

    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('.css').removeClass('active');
      }
    });

    if ($(this).val() != '') $(this).parent('.css').addClass('active');

  });

  // generate intent
  $('.btn').on('click', function() {
    var start_text = 'http://www.necon.com.br/documentos/PJPFASDOC/';
    var end_text = '/menu.html';
    var N1 = encodeURIComponent($('#d1').val());
    var generated_url = "";
    var url = (start_text + N1 + end_text);
    window.open(url, '_self');
  })

});