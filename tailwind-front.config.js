const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");

module.exports = {
    content: [
        "./src/**/*.{html,js}",
        "node_modules/@frostui/tailwindcss/dist/*.js",
        "./Modules/Front/Resources/**/*.blade.php",
        "./Modules/Front/Resources/**/**/*.blade.php",
        "./Modules/Front/Resources/**/**/**/*.blade.php",
        "./Modules/Customer/Resources/**/**/**/*.blade.php",
        "./Modules/Customer/Resources/**/**/*.blade.php",
        "./Modules/ECommerce/**/**/**/*.php",
        "./resources/**/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: ["class"],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "1rem",
                md: "1rem",
                lg: "1rem",
                xl: "3rem",
                "2xl": "13rem",
            },
        },
        fontFamily: {
            body: ["Be Vietnam Pro", "sans-serif"],
        },
        fontSize: {
            xs: ["0.75em", "1em"],
            sm: ["0.875em", "1.25em"],
            base: ["1em", "1.5em"],
            lg: ["1.125em", "1.5em"],
            xl: ["1.25em", "1.5em"],
            "2xl": ["1.5em", "1.25"],
            "3xl": ["1.875em", "1.25"],
            "4xl": ["2.25em", "1"],
            "5xl": ["3em", "1"],
            "6xl": ["3.75em", "1"],
            "7xl": ["4.5em", "1"],
            "8xl": ["6em", "1"],
            "9xl": ["8em", "1"],
        },
        extend: {
            colors: {
                primary: colors.blue[600],
                secondary: colors.slate[300],
                success: colors.green[600],
                warning: colors.yellow[600],
                info: colors.sky[600],
                danger: colors.red[600],
                light: colors.slate[300],
                dark: colors.slate[800],
            },
        },
    },

    plugins: [
        require("@frostui/tailwindcss/plugin"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        // plugin(function ({ addVariant }) {
        //     addVariant(
        //         "sm-only",
        //         "@media screen and (max-width: theme('screens.sm'))"
        //     ); // instead of hard-coded 640px use sm breakpoint value from config. Or anything
        // }),
    ],
};
