"use strict";

document.addEventListener('DOMContentLoaded', function() {
     $(document).ready(function() {
          $('.block__title').click(function(event) {
               if($('.block').hasClass('one')) {
                    $('.block__title').not($(this)).removeClass('active');
                    $('.block__text').not($(this).next()).slideToggle(300);
               }
               $(this).toggleClass('active').next().slideToggle(400);
          });
     });
});

