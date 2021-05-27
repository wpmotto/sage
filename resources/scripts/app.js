import { createApp } from 'vue';
import Modal from './components/Modal.vue';
import SlideOver from './components/SlideOver.vue';
import SvgVue from 'svg-vue3';

const app = createApp({});
app.use(SvgVue);
app
  .component('modal', Modal)
  .component('slide-over', SlideOver)
  .mount('#app')

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

console.log('DOM has loaded. Do other cool stuff. <= ./resources/assets/scripts/app/js');
