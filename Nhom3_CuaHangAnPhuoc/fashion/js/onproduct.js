

var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    allowTouchMove:false
  });
  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    // centeredSlides: true,
    slidesPerView: 5,
    slideToClickedSlide: true,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  galleryTop.controller.control = galleryThumbs;
  galleryThumbs.controller.control = galleryTop;

function ChonKichCo(str){

  var x = document.getElementsByClassName("KichCo");
  var i;
  for (i = 0; i < x.length; i++) {
      x[i].classList.remove("btn-danger");
  }

  var element = document.getElementById(str);
  element.classList.remove("btn-light");
  element.classList.add("btn-danger");
  document.getElementById('kichco_input').value=str;
}