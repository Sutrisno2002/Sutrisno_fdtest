import { Chart } from "chart.js/auto";

window.Chart = Chart;

window.chartjs_options = {
    colors: {
        primary: "rgb(63 131 248 / 1)",
        secondary: "rgb(100 116 139 / 1)",
        success: "rgb(14 159 110 / 1)",
        warning: "rgb(250 202 21 / 1)",
        info: "rgb(6 182 212 / 1)",
        danger: "rgb(240 82 82 / 1)",
        light: "rgb(209 213 219 / 1)",
        dark: "rgb(30 41 59 / 1)",
        trasparent_primary: "rgb(63 131 248 / .5)",
        trasparent_secondary: "rgb(100 116 139 / .5)",
        trasparent_success: "rgb(14 159 110 / .5)",
        trasparent_warning: "rgb(250 202 21 / .5)",
        trasparent_info: "rgb(6 182 212 / .5)",
        trasparent_danger: "rgb(240 82 82 / .5)",
        trasparent_light: "rgb(209 213 219 / .5)",
        trasparent_dark: "rgb(30 41 59 / .5)",
        gradient_primary: {
            from: "rgb(63 131 248 / 0.1)",
            to: "rgb(63 131 248 / 0.5)",
        },
        gradient_secondary: {
            from: "rgb(100 116 139 / 0.1)",
            to: "rgb(100 116 139 / 0.5)",
        },
        gradient_success: {
            from: "rgb(14 159 110 / 0.1)",
            to: "rgb(14 159 110 / 0.5)",
        },
        gradient_warning: {
            from: "rgb(250 202 21 / 0.1)",
            to: "rgb(250 202 21 / 0.5)",
        },
        gradient_info: {
            from: "rgb(6 182 212 / 0.1)",
            to: "rgb(6 182 212 / 0.5)",
        },
        gradient_danger: {
            from: "rgb(240 82 82 / 0.1)",
            to: "rgb(240 82 82 / 0.5)",
        },
        gradient_light: {
            from: "rgb(209 213 219 / 0.1)",
            to: "rgb(209 213 219 / 0.5)",
        },
        gradient_dark: {
            from: "rgb(30 41 59 / 0.1)",
            to: "rgb(30 41 59 / 0.5)",
        },
    },
    // PIE CHART
    pie: {
        type: "pie",
        data: {},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "",
                },
            },
        },
    },
    // LINE CHART
    line: {
        type: "line",
        data: {},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "",
                },
            },
        },
    },
    // BAR CHART
    bar: {
        type: "bar",
        data: {},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "",
                },
            },
        },
    },
    // BUBBLE
    bubble: {
        type: "bubble",
        data: {},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "",
                },
            },
        },
    },
    // RADAR CHART
    radar: {
        type: "radar",
        data: {},
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "",
                },
            },
        },
    },
    // DOUGHNUT
    doughnut: {
        type: "doughnut",
        data: {},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "",
                },
            },
        },
    },
};
