/**
 * Author: SOC Software House
 * Module/App: extended-niceselect.js
 */
import NiceSelect from "nice-select2/src/js/nice-select2";

window.initSelectize = (el, config) => {
    const element = document.querySelector(`#${el}`);
    return new NiceSelect(element, config);
};
