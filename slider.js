document.addEventListener("DOMContentLoaded", () => {

  const slides = document.querySelectorAll(".slide");

  const prev = document.querySelector(".slider-btn.prev");
  const next = document.querySelector(".slider-btn.next");

  const dotsBox = document.querySelector(".slider-dots");


  if (!slides.length) return;


  let current = 0;

  let touchStartX = 0;
  let touchEndX = 0;



  // CREA PALLINI

  slides.forEach((slide, index) => {

    const dot = document.createElement("span");

    if (index === 0) {
      dot.classList.add("active");
    }

    dot.addEventListener("click", () => {
      showSlide(index);
    });

    dotsBox.appendChild(dot);

  });


  const dots = document.querySelectorAll(".slider-dots span");



  function showSlide(index) {


    slides[current].classList.remove("active");

    dots[current].classList.remove("active");


    current = index;


    slides[current].classList.add("active");

    dots[current].classList.add("active");

  }



  // FRECCE

  next.addEventListener("click", () => {

    showSlide((current + 1) % slides.length);

  });


  prev.addEventListener("click", () => {

    showSlide((current - 1 + slides.length) % slides.length);

  });



  // =========================
  // SWIPE TOUCH
  // =========================


  const slider = document.querySelector(".bianca-slider");


  slider.addEventListener("touchstart", (e) => {

    touchStartX = e.changedTouches[0].screenX;

  }, {passive:true});



  slider.addEventListener("touchend", (e) => {

    touchEndX = e.changedTouches[0].screenX;

    handleSwipe();

  }, {passive:true});



  function handleSwipe() {


    const distance = touchEndX - touchStartX;


    // swipe verso sinistra → immagine successiva

    if (distance < -50) {

      showSlide((current + 1) % slides.length);

    }


    // swipe verso destra → immagine precedente

    if (distance > 50) {

      showSlide((current - 1 + slides.length) % slides.length);

    }


  }


});