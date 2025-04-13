//  line chart datalabel

import ApexCharts from "apexcharts";

window.ApexCharts = ApexCharts;

window.chart_options = {
    // PIE CHART
    pie: {
        chart: {
            height: 320,
            type: "pie",
        },
        series: [],
        labels: [],
        colors: ["#34c38f", "#556ee6", "#f46a6a", "#50a5f1", "#f1b44c"],
        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: false,
            fontSize: "14px",
            offsetX: 0,
        },
        stroke: {
            colors: ["transparent"],
        },
        responsive: [
            {
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240,
                    },
                    legend: {
                        show: false,
                    },
                },
            },
        ],
    },
    // LINE CHART
    line: {
        chart: {
            height: 380,
            type: "line",
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        colors: ["#556ee6", "#34c38f"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: [3, 3],
            curve: "straight",
        },
        series: [],
        title: {
            text: "Chart Line Title",
            align: "left",
            style: {
                fontWeight: "500",
            },
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"], // takes an array which will be repeated on columns
                opacity: 0.2,
            },
            borderColor: "#9ca3af20",
        },
        markers: {
            style: "inverted",
            size: 6,
        },
        xaxis: {
            categories: [],
            title: {
                text: "Month",
            },
        },
        yaxis: {
            title: {
                text: "Temperature",
            },
            min: 5,
            max: 40,
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: true,
            offsetY: -25,
            offsetX: -5,
        },
        responsive: [
            {
                breakpoint: 600,
                options: {
                    chart: {
                        toolbar: {
                            show: false,
                        },
                    },
                    legend: {
                        show: false,
                    },
                },
            },
        ],
    },
    // LINE CHART DATALABEL
    line_datalabel: {
        chart: {
            height: 380,
            type: "line",
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        colors: ["#556ee6", "#f46a6a", "#34c38f"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: [3, 4, 3],
            curve: "straight",
            dashArray: [0, 8, 5],
        },
        series: [],
        title: {
            text: "Line Chart Title",
            align: "left",
            style: {
                fontWeight: "500",
            },
        },
        markers: {
            size: 0,

            hover: {
                sizeOffset: 6,
            },
        },
        xaxis: {
            categories: [],
        },
        tooltip: {
            y: [
                {
                    title: {
                        formatter: function (val) {
                            return val + " (mins)";
                        },
                    },
                },
                {
                    title: {
                        formatter: function (val) {
                            return val + " per session";
                        },
                    },
                },
                {
                    title: {
                        formatter: function (val) {
                            return val;
                        },
                    },
                },
            ],
        },
        grid: {
            borderColor: "#9ca3af20",
        },
    },
    // AREA CHART
    area: {
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
            width: 3,
        },
        series: [],
        colors: ["#556ee6", "#34c38f"],
        xaxis: {
            type: "datetime",
            categories: [],
        },
        grid: {
            borderColor: "#9ca3af20",
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm",
            },
        },
    },
    // COLUMN CHART
    bar_column: {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "45%",
                endingShape: "rounded",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        series: [],
        colors: ["#34c38f", "#556ee6", "#f46a6a"],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: "Rp",
                style: {
                    fontWeight: "500",
                },
            },
        },
        grid: {
            borderColor: "#9ca3af20",
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "Rp " + val;
                },
            },
        },
    },
    // COLUMN CHART DATALABEL
    bar_column_datalabel: {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    position: "top", // top, center, bottom
                },
            },
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + "%";
            },
            offsetY: -22,
            style: {
                fontSize: "12px",
                colors: ["#304758"],
            },
        },
        series: [],
        colors: ["#556ee6"],
        grid: {
            borderColor: "#9ca3af20",
        },
        xaxis: {
            categories: [],
            position: "top",
            labels: {
                offsetY: -18,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            crosshairs: {
                fill: {
                    type: "gradient",
                    gradient: {
                        colorFrom: "#D8E3F0",
                        colorTo: "#BED1E6",
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    },
                },
            },
            tooltip: {
                enabled: true,
                offsetY: -35,
            },
        },
        fill: {
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [50, 0, 100, 100],
            },
        },
        yaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                    return val + "%";
                },
            },
        },
        title: {
            text: "Column Chart Title",
            floating: true,
            offsetY: 330,
            align: "center",
            style: {
                color: "#444",
                fontWeight: "500",
            },
        },
    },
    // BAR CHART
    bar: {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        dataLabels: {
            enabled: false,
        },
        series: [],
        colors: ["#34c38f"],
        grid: {
            borderColor: "#9ca3af20",
        },
        xaxis: {
            categories: [],
        },
    },
    mixed: {
        chart: {
            height: 350,
            type: "line",
            stacked: false,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: [0, 2, 4],
            curve: "smooth",
        },
        plotOptions: {
            bar: {
                columnWidth: "50%",
            },
        },
        colors: ["#f46a6a", "#556ee6", "#34c38f"],
        series: [],
        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: "light",
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100],
            },
        },
        labels: [],
        markers: {
            size: 0,
        },
        xaxis: {
            type: "datetime",
        },
        yaxis: {
            title: {
                text: "Points",
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " points";
                    }
                    return y;
                },
            },
        },
        grid: {
            borderColor: "#9ca3af20",
        },
    },
    // RADIAL CHART
    radial_bar: {
        chart: {
            height: 370,
            type: "radialBar",
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: "22px",
                    },
                    value: {
                        fontSize: "16px",
                    },
                    total: {
                        show: true,
                        label: "Total",
                        formatter: function (w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 249;
                        },
                    },
                },
            },
        },
        colors: ["#556ee6", "#34c38f", "#f46a6a", "#f1b44c"],
        series: [],
        labels: [],
    },
    // DONUT CHART
    donut: {
        chart: {
            height: 320,
            type: "donut",
        },
        colors: ["#34c38f", "#556ee6", "#f46a6a", "#50a5f1", "#f1b44c"],
        series: [],
        labels: [],
        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: false,
            fontSize: "14px",
            offsetX: 0,
        },
        stroke: {
            colors: ["transparent"],
        },
        responsive: [
            {
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240,
                    },
                    legend: {
                        show: false,
                    },
                },
            },
        ],
    },
};
