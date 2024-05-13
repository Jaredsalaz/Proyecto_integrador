'use strict';
const toggleBtn = document.querySelectorAll('.faq__item--btns');

toggleBtn.forEach(btns => {
  btns.addEventListener('click', () => {
    btns.parentNode.classList.toggle('active');
  });
});
