window._ = require("lodash");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import mask from "@alpinejs/mask";
import Clipboard from "@ryangjchandler/alpine-clipboard";
import collapse from "@alpinejs/collapse";

window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

Alpine.plugin(mask);
Alpine.plugin(collapse);
Alpine.plugin(Clipboard);
