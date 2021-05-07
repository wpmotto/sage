import domReady from '@wordpress/dom-ready';

/**
 * External Dependencies
 */
document.querySelectorAll('[data-toggle-class]').forEach((element) => {
  element.addEventListener('click', (event) => {
    event.preventDefault();
    const [target, className] = element.getAttribute('data-toggle-class').split(':');
    document.querySelector(target).classList.toggle(className);
  });
});

domReady(() => {
  console.log('DOM has loaded. Do other cool stuff. <= ./resources/assets/scripts/app/js');
});
