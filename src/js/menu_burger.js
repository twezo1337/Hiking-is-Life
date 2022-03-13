"use strict";

const burger = document.querySelector(".icon__menu"),
      menu   = document.querySelector(".burger__content");

burger.addEventListener("click", () => {
     burger.classList.toggle("_active");
     menu.classList.toggle("_active"); 
});