"use strict";

const btns = document.querySelectorAll(".menu__drop__content"),
      drops = document.querySelectorAll(".menu__list__drop");
let ind = 0;
let btn;
let drop;


const activeDrop = n => {
     for(drop of drops) {
          drop.classList.remove('drop_show');
     }
     drops[n].classList.add('drop_show');
};

btns.forEach((item, indexDot) => {
     item.addEventListener('click', () => {
          activeDrop(indexDot);
     });
});


document.onclick = (event) => {
     if (!event.target.matches('.menu__list')) {
          for(drop of drops) {
               if (drop.classList.contains('drop_show')) {
                    drop.classList.remove('drop_show');
               }
          }
     }
};
