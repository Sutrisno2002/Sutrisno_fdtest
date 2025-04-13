const mix = require("laravel-mix");
require("mix-tailwindcss");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

//  Front Resources
mix.sass("resources/dist/front/scss/front.scss", "public/assets/front/css")
    .tailwind("./tailwind-front.config.js")
    .version();
mix.sass(
    "resources/dist/front/scss/icons.scss",
    "public/assets/front/css"
).version();

mix.js("resources/dist/front/js/front.js", "public/assets/front/js").version();
mix.js(
    "resources/dist/front/js/vendor/shareon.js",
    "public/assets/front/js/vendor"
).version();
mix.js(
    "resources/dist/front/js/vendor/markdown-parser.js",
    "public/assets/front/js/vendor"
).version();

// mix.copy("node_modules/boxicons/fonts", "public/assets/front/fonts");
// mix.copyDirectory("resources/dist/front/images", "public/assets/front/images");
// mix.copyDirectory(
//     "resources/dist/front/scss/fonts",
//     "public/assets/front/fonts"
// );
// .copyDirectory("resources/dist/front/js", "public/assets/front/js")
// .copyDirectory("resources/dist/front/fonts", "public/assets/front/fonts")
// .copyDirectory("resources/dist/front/images", "public/assets/front/images")
// .copyDirectory("resources/dist/front/css", "public/assets/front/css")
// .copyDirectory('resources/dist/front/img', 'public/assets/front/img')
// .copyDirectory('resources/dist/front/js', 'public/assets/front/js')
// .copyDirectory('resources/dist/front/vendor', 'public/assets/front/vendor')
// .copyDirectory(
//     "resources/dist/front/rs-plugin",
//     "public/assets/front/rs-plugin"
// )

// Panel Resources
mix.sass("resources/dist/panel/scss/app.scss", "public/assets/panel/css")
    .tailwind()
    .version();
mix.sass(
    "resources/dist/panel/scss/icons.scss",
    "public/assets/panel/css"
).version();
mix.sass(
    "resources/dist/panel/scss/plugins.scss",
    "public/assets/panel/css"
).version();

// Theme JS
// mix.js("resources/dist/panel/js/app.js", "public/assets/panel/js");
// mix.js("resources/dist/panel/js/main.js", "public/assets/panel/js");
// mix.js("resources/dist/panel/js/config.js", "public/assets/panel/js");
// mix.js('resources/dist/panel/js/head.js', 'public/assets/panel/js')

// Pages
// mix.js('resources/dist/panel/js/pages/dashboard.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/apps-calendar.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/apps-kanban.js', 'public/assets/panel/js/pages')
// mix.js(
//     "resources/dist/panel/js/pages/editor.js",
//     "public/assets/panel/js/pages"
// );
// mix.js(
//     "resources/dist/panel/js/pages/extended-filepond.js",
//     "public/assets/panel/js/pages"
// );
// mix.js(
//     "resources/dist/panel/js/pages/extended-selectize.js",
//     "public/assets/panel/js/pages"
// );
// mix.js(
//     "resources/dist/panel/js/pages/extended-tagify.js",
//     "public/assets/panel/js/pages"
// );
// mix.js(
//     "resources/dist/panel/js/pages/extended-wizard.js",
//     "public/assets/panel/js/pages"
// );
// mix.js('resources/dist/panel/js/pages/extended-animation.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-sortable.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-plyr.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-sweetalert.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-swiper.js', 'public/assets/panel/js/pages')
// mix.js(
//     "resources/dist/panel/js/pages/extended-cropperjs.js",
//     "public/assets/panel/js/pages"
// );
// mix.js('resources/dist/panel/js/pages/extended-tippy.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-tour.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-inputmask.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-fileupload.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-flatpickr.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-ratings.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-editor.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/extended-lightbox.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-color-pickr.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-rangeslider.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-select.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/form-validation.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/icons-material-symbols.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/icons-mingcute.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/maps-google.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/maps-vector.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/gallery.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/table-gridjs.js', 'public/assets/panel/js/pages')
mix.js(
    "resources/dist/panel/js/pages/chartjs.js",
    "public/assets/panel/js/pages"
);
// mix.js('resources/dist/panel/js/pages/charts-apex.js', 'public/assets/panel/js/pages')
// mix.js('resources/dist/panel/js/pages/highlight.js', 'public/assets/panel/js/pages')

// Copy
// mix.copy('node_modules/froala-editor/css/froala_editor.pkgd.min.css', 'public/assets/panel/vendor/froala')
// mix.copy('node_modules/filepond/dist/filepond.min.css', 'public/assets/panel/vendor/filepond')
// mix.copy('node_modules/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.min.css', 'public/assets/panel/vendor/filepond')
// mix.copy('node_modules/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.min.css', 'public/assets/panel/vendor/filepond')
// mix.copy('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css', 'public/assets/panel/vendor/filepond')
// mix.copy("node_modules/@yaireo/tagify/dist/tagify.css","public/assets/panel/vendor/tagify");
// mix.copy(
//     "node_modules/livewire-sortable/dist/livewire-sortable.js",
//     "public/assets/panel/vendor/livewire"
// );

// mix.copy('node_modules/animate.css/animate.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/animate.css/animate.compat.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/glightbox/dist/css/glightbox.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/plyr/dist/plyr.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/nouislider/dist/nouislider.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/swiper/swiper-bundle.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/tippy.js/dist/tippy.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/shepherd.js/dist/css/shepherd.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/quill/dist/quill.core.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/quill/dist/quill.bubble.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/quill/dist/quill.snow.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/dropzone/dist/min/dropzone.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/flatpickr/dist/flatpickr.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/@simonwep/pickr/dist/themes/classic.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/@simonwep/pickr/dist/themes/monolith.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/@simonwep/pickr/dist/themes/nano.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/nouislider/dist/nouislider.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/nice-select2/dist/css/nice-select2.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/jsvectormap/dist/css/jsvectormap.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/glightbox/dist/css/glightbox.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/gridjs/dist/theme/mermaid.min.css', 'public/assets/panel/vendor')
// mix.copy('node_modules/dropzone/dist/min/dropzone.min.js', 'public/assets/panel/vendor')
// mix.copy('resources/dist/panel/vendor/richtexteditor/rte.js', 'public/assets/panel/vendor/rte')
// mix.copy('resources/dist/panel/vendor/richtexteditor/plugins/all_plugins.js', 'public/assets/panel/vendor/rte')
// mix.copyDirectory('resources/dist/panel/scss/icons/fonts', 'public/assets/panel/css/fonts')
// mix.copyDirectory('node_modules/boxicons/fonts', 'public/assets/panel/fonts')
// mix.copyDirectory('resources/dist/panel/vendor', 'public/assets/panel/vendor')
