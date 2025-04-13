/**
 * Author: SOC Software House
 * Module/App: Main js
 */

import FroalaEditor from "froala-editor/js/froala_editor.pkgd.min.js";

window.initEditor = (el, config, blur) => {
    return new FroalaEditor(`#${el}`, {
        codeBeautifierOptions: {
            end_with_newline: true,
            indent_inner_html: true,
            extra_liners:
                "['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'pre', 'ul', 'ol', 'table', 'dl']",
            brace_style: "expand",
            indent_char: " ",
            indent_size: 4,
            wrap_line_length: 0,
        },
        toolbarButtons: {
            moreText: {
                buttons: [
                    "bold",
                    "italic",
                    "underline",
                    "strikeThrough",
                    "subscript",
                    "superscript",
                    "fontFamily",
                    "textColor",
                    "backgroundColor",
                    "inlineClass",
                    "clearFormatting",
                ],
            },
            moreParagraph: {
                buttons: [
                    "alignLeft",
                    "alignCenter",
                    "formatOLSimple",
                    "alignRight",
                    "alignJustify",
                    "formatOL",
                    "formatUL",
                    "paragraphFormat",
                    "paragraphStyle",
                    "lineHeight",
                    "outdent",
                    "indent",
                    "quote",
                ],
            },
            moreRich: {
                buttons: [
                    "insertImage",
                    "insertVideo",
                    "insertTable",
                    "emoticons",
                    "insertHR",
                ],
            },
            moreMisc: {
                buttons: [
                    "markdown",
                    "undo",
                    "redo",
                    "fullscreen",
                    "selectAll",
                    "html",
                    "help",
                ],
            },
        },
        fontFamilySelection: true,

        // Set the image upload parameter.
        imageUploadParam: "image",
        imageUploadURL: config.image.upload_url,
        imageUploadParams: config.image.params,
        imageUploadMethod: "POST",
        imageMaxSize: 2 * 1024 * 1024, // Set max image size to 2048Kb.
        imageAllowedTypes: ["jpeg", "jpg", "png"],
        events: {
            "image.beforeUpload": function (images) {
                // Return false if you want to stop the image upload.
            },
            "image.uploaded": function (response) {
                // Image was uploaded to the server.
            },
            "image.inserted": function ($img, response) {
                // Image was inserted in the editor.
            },
            "image.replaced": function ($img, response) {
                // Image was replaced in the editor.
            },
            "image.error": function (error, response) {},
        },

        events: {
            initialized: function () {
                document.querySelector(".fr-second-toolbar").remove();
            },
            "image.removed": function ($img) {
                let data = new FormData();
                data.append("_token", config.image.params._token);
                data.append("image", $img.attr("src"));

                const remove = fetch(config.image.destroy_url, {
                    method: "POST",
                    body: data,
                });
                remove
                    .then((res) => res.json())
                    .then((res) => {
                        alert(res.message);
                    })
                    .catch((e) => {
                        alert(e.message);
                    });
            },
            blur: blur,
        },
    });
};
