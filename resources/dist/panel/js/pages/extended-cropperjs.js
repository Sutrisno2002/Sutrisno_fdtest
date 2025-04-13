/**
 * Author: SOC Software House
 * Module/App: extended-cropie.js
 */
import "cropperjs/dist/cropper.min.css";
window.Cropper = require("cropperjs");

window.initCrop = (image, config) => {
    const default_config = {
        aspectRatio: 1 / 1,
    };
    const options = Object.assign(default_config, config);
    const cropper = new Cropper(image, options);

    return cropper;
};
