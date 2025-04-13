/**
 * Author: SOC Software House
 * Module/App: extended-tagify.js
 */
import Tagify from "@yaireo/tagify";

window.initTagify = (el, config) => {
    const element = document.querySelector(`#${el}`);
    return new Tagify(element, config);
};
