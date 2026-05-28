<!-- To reuse the chart, just call it again with different config values at the end of the script -->

<!--begin::Charts Widget 3-->
<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">TEMPLATE: Chart Title</span>
            <span class="text-muted fw-semibold fs-7">template</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <div id="line-chart-id" style="height: 350px"></div> <!--card body div id, use this in the config elementId-->
    </div>
    <!--end::Body-->
</div>
<!--end::Charts Widget 3-->

<script>
    var areaChartWidget = function(config) {
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
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
            var baseColor = KTUtil.getCssVariableValue(config.color || '--bs-info');
            var lightColor = KTUtil.getCssVariableValue(config.lightColor || '--bs-info-light');

            var options = {
                series: [{
                    name: config.seriesName || 'Value',
                    data: config.data,
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: height,
                    toolbar: {
                        show: false
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1,
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [baseColor],
                },
                xaxis: {
                    categories: config.categories,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        },
                    },
                    crosshairs: {
                        position: 'front',
                        stroke: {
                            color: baseColor,
                            width: 1,
                            dashArray: 3,
                        },
                    },
                    tooltip: {
                        enabled: true,
                        offsetY: 0,
                        style: {
                            fontSize: '12px'
                        },
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        },
                    },
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function(val) {
                            return val + (config.tooltipSuffix || '');
                        },
                    },
                },
                colors: [lightColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                },
                markers: {
                    strokeColor: baseColor,
                    strokeWidth: 3,
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

        KTThemeMode.on('kt.thememode.change', function() {
            if (chart.rendered) {
                chart.self.destroy();
            }
            initChart();
        });
    };

    window.addEventListener('load', function() {
        areaChartWidget({
            elementId: 'line-chart-id', //card body div id
            seriesName: 'Logins',
            data: [924, 4424, 4692, 1523, 550, 455, 205],
            categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
            tooltipSuffix: ' users',
        });
    });
</script>