"use strict";

const prev = document.querySelector('#btn-prev'),
      next = document.querySelector('#btn-next'),
      slides = document.querySelectorAll(".slider__slide"),
      dots = document.querySelectorAll(".slider__switch");
let index = 0;
let slide;
let dot;

const activeSlide = n => {
     for(slide of slides) {
          slide.classList.remove('_show');
     }
     slides[n].classList.add('_show');
};

const activeDot = n => {
     for(dot of dots) {
          dot.classList.remove('_active');
     }
     dots[n].classList.add('_active');
};

const prepareCurrentSlide = ind => {
     activeSlide(ind);
     activeDot(ind);
};


const nextSlide = () => {
     if(index == slides.length - 1) {
          index = 0;
          prepareCurrentSlide(index);
     } else {
          index++;
          prepareCurrentSlide(index);
     }
};

const prevSlide = () => {
     if(index == 0) {
          index = slides.length - 1;
          prepareCurrentSlide(index);
     } else {
          index--;
          prepareCurrentSlide(index);
     }
};

dots.forEach((item, indexDot) => {
     item.addEventListener('click', () => {
          index = indexDot;
          prepareCurrentSlide(index);
     });
});

next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);