// ├─ filepond-plugin-file-poster@2.5.1
// ├─ filepond-plugin-image-crop@2.0.6
// ├─ filepond-plugin-image-resize@2.0.10
// ├─ filepond-plugin-image-transform@3.8.7
// └─ filepond @4.30.4

/**
 * Author: SOC Software House
 * Module/App: extended-filepond.js
 */
window.FilePond = require("filepond/dist/filepond");

import FilePondPluginFileMetadata from "filepond-plugin-file-metadata";
import FilePondPluginFilePoster from "filepond-plugin-file-poster";
import FilePondPluginImageCrop from "filepond-plugin-image-crop";
import FilePondPluginImageEdit from "filepond-plugin-image-edit";
import FilePondPluginImageExifOrientation from "filepond-plugin-image-exif-orientation";
import FilePondPluginImageFilter from "filepond-plugin-image-filter";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginImageResize from "filepond-plugin-image-resize";
import FilePondPluginImageTransform from "filepond-plugin-image-transform";

window.initFilepond = (el, config) => {
    const element = document.querySelector(`#${el}`);
    const default_config = {
        allowDrop: false,
        allowReplace: false,
        instantUpload: true,
        allowImagePreview: true,
        imagePreviewHeight: 170,
        filePosterHeight: 170,
    };
    const options = Object.assign(default_config, config);

    FilePond.registerPlugin(
        FilePondPluginFileMetadata,
        FilePondPluginFilePoster,
        FilePondPluginImageCrop,
        FilePondPluginImageEdit,
        FilePondPluginImageExifOrientation,
        FilePondPluginImageFilter,
        FilePondPluginImagePreview,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    FilePond.setOptions(options);

    return FilePond.create(element);
};
