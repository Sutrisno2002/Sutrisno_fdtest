import {
    defineConfig
} from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Theme Css
                'resources/dist/panel/scss/app.scss',
                'resources/dist/panel/scss/icons.scss',

                'node_modules/animate.css/animate.min.css',
                'node_modules/animate.css/animate.compat.css',
                'node_modules/glightbox/dist/css/glightbox.min.css',
                'node_modules/plyr/dist/plyr.css',
                'node_modules/nouislider/dist/nouislider.min.css',
                'node_modules/sweetalert2/dist/sweetalert2.min.css',
                'node_modules/swiper/swiper-bundle.min.css',
                'node_modules/tippy.js/dist/tippy.css',
                'node_modules/shepherd.js/dist/css/shepherd.css',
                'node_modules/quill/dist/quill.core.css',
                'node_modules/quill/dist/quill.bubble.css',
                'node_modules/quill/dist/quill.snow.css',
                'node_modules/dropzone/dist/min/dropzone.min.css',
                'node_modules/flatpickr/dist/flatpickr.min.css',
                'node_modules/@simonwep/pickr/dist/themes/classic.min.css',
                'node_modules/@simonwep/pickr/dist/themes/monolith.min.css',
                'node_modules/@simonwep/pickr/dist/themes/nano.min.css',
                'node_modules/nouislider/dist/nouislider.min.css',
                'node_modules/nice-select2/dist/css/nice-select2.css',
                'node_modules/jsvectormap/dist/css/jsvectormap.min.css',
                'node_modules/glightbox/dist/css/glightbox.min.css',
                'node_modules/gridjs/dist/theme/mermaid.min.css',
                'node_modules/dropzone/dist/min/dropzone.min.js',

                // Theme Js
                'resources/dist/panel/js/config.js',
                'resources/dist/panel/js/app.js',
                'resources/dist/panel/js/head.js',

                'resources/dist/panel/js/pages/dashboard.js',
                'resources/dist/panel/js/pages/apps-calendar.js',
                'resources/dist/panel/js/pages/apps-kanban.js',
                'resources/dist/panel/js/pages/extended-animation.js',
                'resources/dist/panel/js/pages/extended-sortable.js',
                'resources/dist/panel/js/pages/extended-plyr.js',
                'resources/dist/panel/js/pages/extended-sweetalert.js',
                'resources/dist/panel/js/pages/extended-swiper.js',
                'resources/dist/panel/js/pages/extended-tippy.js',
                'resources/dist/panel/js/pages/extended-tour.js',
                'resources/dist/panel/js/pages/form-inputmask.js',
                'resources/dist/panel/js/pages/form-fileupload.js',
                'resources/dist/panel/js/pages/form-flatpickr.js',
                'resources/dist/panel/js/pages/extended-ratings.js',
                'resources/dist/panel/js/pages/form-editor.js',
                'resources/dist/panel/js/pages/extended-lightbox.js',
                'resources/dist/panel/js/pages/form-color-pickr.js',
                'resources/dist/panel/js/pages/form-rangeslider.js',
                'resources/dist/panel/js/pages/form-select.js',
                'resources/dist/panel/js/pages/form-validation.js',
                'resources/dist/panel/js/pages/icons-material-symbols.js',
                'resources/dist/panel/js/pages/icons-mingcute.js',
                'resources/dist/panel/js/pages/maps-google.js',
                'resources/dist/panel/js/pages/maps-vector.js',
                'resources/dist/panel/js/pages/gallery.js',
                'resources/dist/panel/js/pages/table-gridjs.js',
                'resources/dist/panel/js/pages/charts-apex.js',

                // Code Highlight Js
                'resources/dist/panel/js/pages/highlight.js',
            ],
            refresh: true
        }),
    ],
});
