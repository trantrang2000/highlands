import "swiper/css/bundle";
import Swiper from "swiper";

new Swiper(".popular-products", {
  slidesPerView: 2,
  spaceBetween: 16,
  autoHeight: true,
  autoplay: {
    delay: 3000
  },
  breakpoints: {
    768: {
      slidesPerView: 4,
      spaceBetween: 32
    }
  }
});