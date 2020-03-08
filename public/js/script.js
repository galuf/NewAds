/*Banner slider swiper*/
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });


/**** registro ******************** */

$(function(){
  $("#btn").on("click",function(){
    $("#formulario").validate ({
      rules: {
        email: {required: true, email:true,minlength:8,maxlength:30},
        
      },
      messages:{
        email:{requiered:'Campo requerido',email: 'formato incorrecto',minlength:'minimo 8 carateres',maxlength:'maximo 30 caragteres'}
      }
    });
  });
});