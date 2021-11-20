import "@fancyapps/ui/dist/fancybox.css";
import { Fancybox } from "@fancyapps/ui";

Fancybox.bind('[data-fancybox="gallery"]', {
  dragToClose: false,

  Toolbar: false,
  closeButton: "top",

  Image: {
    zoom: false
  },

  on: {
    initCarousel: (fancybox) => {
      const slide = fancybox.Carousel.slides[fancybox.Carousel.page];

      fancybox.$container.style.setProperty(
        "--bg-image",
        `url("${slide.$thumb.src}")`
      );
    },
    "Carousel.change": (fancybox, carousel, to, from) => {
      const slide = carousel.slides[to];

      fancybox.$container.style.setProperty(
        "--bg-image",
        `url("${slide.$thumb.src}")`
      );
    }
  }
});

const btnPlus = document.querySelector("#btn-plus"),
  btnDash = document.querySelector("#btn-dash"),
  qty = document.querySelector("#qty"),
  qtyInput = document.querySelector("#qtyInput"),
  quantityResult = document.querySelector("#quantityResult").textContent;

const updateQty = (value) => {
  const oldValue = Number(qty.textContent);
  if (
    (oldValue === 1 && value < 0) ||
    (oldValue === Number(quantityResult) && value > 0)
  ) {
    return;
  }
  const newValue = oldValue + value;
  qty.textContent = newValue;
  qtyInput.value = newValue;
};

btnPlus.addEventListener("click", () => updateQty(1));
btnDash.addEventListener("click", () => updateQty(-1));
