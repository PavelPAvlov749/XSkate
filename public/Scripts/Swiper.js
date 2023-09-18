const swiper_btn =  {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }
}

const swiper_pagination = {
    pagination : {
        el : '.swiper-pagination'
    }
}
var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
    },
  });

console.log(window.innerWidth < 802);