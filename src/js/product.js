import "swiper/css/bundle";
import Swiper from "swiper";

new Swiper(".category", {
  slidesPerView: 2,
  spaceBetween: 10,
  autoHeight: true,
  autoplay: {
    delay: 3000
  },
  breakpoints: {
    768: {
      slidesPerView: 3
    }
  }
});
