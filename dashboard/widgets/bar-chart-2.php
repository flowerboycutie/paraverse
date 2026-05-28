<!-- To reuse the chart, just call it again with different config values at the end of the script -->

<!--begin::Charts Widget 1-->
<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">TEMPLATE: Chart Title</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <div id="bar-chart-2-id" style="height: 350px"></div> <!--card body div id, use this in the config elementId-->
    </div>
    <!--end::Body-->
</div>
<!--end::Charts Widget 1-->

<script>
    var barChartWidget = function(config) {
        var element = document.getElementById(config.elementId);

        if (!element) {
            return;
        }

        var chart = {
            self: null,
            rendered: false,
        };

        var initChart = function() {
            var height = config.height || 350;
            var labelColor = KTUtil.getCssVariableValue("--bs-gray-500");
            var borderColor = KTUtil.getCssVariableValue("--bs-gray-200");
            var baseColor = KTUtil.getCssVariableValue("--bs-primary");

            var options = {
                series: [{
                    name: config.seriesName || "Value",
                    data: config.data,
                }],
                chart: {
                    fontFamily: "inherit",
                    type: "bar",
                    height: height,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ["30%"],
                        borderRadius: [6],
                    },
                },
                legend: {
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: config.categories,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: "12px",
                        },
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: "12px",
                        },
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    style: {
                        fontSize: "12px",
                    },
                    y: {
                        formatter: function(val) {
                            return val;
                        },
                    },
                },
                colors: [config.color || baseColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true,
                        },
                    },
                },
            };

            if (chart.rendered) {
                chart.self.destroy();
            }

            chart.self = new ApexCharts(element, options);
            chart.self.render();
            chart.rendered = true;
        };

        initChart();

        KTThemeMode.on("kt.thememode.change", function() {
            initChart();
        });
    };

    window.addEventListener("load", function() {
        // TEMPLATE: Configure your chart here
        barChartWidget({
            elementId: "bar-chart-2-id", //card body div id
            seriesName: "Category",
            data: [35, 29, 20, 17, 5, 3],
            categories: ["Fun", "Activity", "Hero", "Learning", "Milestone", "Exclusive"],
        });
    });
</script>