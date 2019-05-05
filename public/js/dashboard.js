$(document).ready(function(){
  
  $('#btn-menu').on('click' , function (){
    $('#dashboard, #content').toggleClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });

  $("ul .option-folder").click(function(){
    $(this).siblings("li").removeClass("color-select");
    $(this).siblings("li").children("a").css('color', '#abadb6');
    $("ul#nivel-2").find("a").css('color','#abadb6');

    $(this).addClass("color-select");
    $(this).find(".rotate").toggleClass("down");
    $(this).find("a").css('color', 'white');
  });

  $("ul li ul .option-folder").click(function(){
    $("ul#nivel-1").find(".color-select").removeClass("color-select");
    $("ul#nivel-1").find("a").css('color','#abadb6');

    $(this).find(".rotate").toggleClass("down");
  });
});
