/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************************!*\
  !*** ./resources/dist/panel/js/pages/extended-animation.js ***!
  \*************************************************************/
function testAnim(x) {
  var sandbox = document.querySelector('#animationSandbox');
  sandbox.classList.add(x, 'animated');
  sandbox.addEventListener('animationend', function () {
    sandbox.classList.remove(x, 'animated');
  }, {
    once: true
  });
}
document.addEventListener('DOMContentLoaded', function () {
  var trigger = document.querySelector('.js--triggerAnimation');
  var animations = document.querySelector('.js--animations');
  trigger.addEventListener('click', function (e) {
    e.preventDefault();
    var anim = animations.value;
    testAnim(anim);
  });
  animations.addEventListener('change', function () {
    var anim = animations.value;
    testAnim(anim);
  });
});
/******/ })()
;