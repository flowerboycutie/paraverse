<!-- To reuse the chart, just call it again with different config values at the end of the script -->

<!--begin::Charts Widget-->
<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">TEMPLATE: Chart Title</span>
        </h3>
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-category fs-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
            </button>
            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="bar-chart-id-menu"> <!-- change this id too -->
                <div class="px-7 py-5">
                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="px-7 py-5">
                    <div class="mb-10">
                        <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#logins-by-source-menu">
                            <option></option>
                            <option value="1">Logins (Last 30 Days)</option>
                            <option value="2">Total Logins</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                    </div>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <div id="bar-chart-id" style="height: 350px"></div> <!--card body div id, use this in the config elementId-->
    </div>
    <!--end::Body-->
</div>
<!--end::Charts Widget-->

<script>
    var multiSeriesBarChart = function(config) {
        var element = document.getElementById(config.elementId);

        if (!element) {
            return;
        }

        var chart = {
            self: null,
            rendered: false,
        };

        var initChart = function(series) {
            var height = config.height || 350;
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
            var baseColor = KTUtil.getCssVariableValue('--bs-primary');
            var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');

            var activeSeries = series || [config.data.series1, config.data.series2];

            var options = {
                series: activeSeries,
                chart: {
                    fontFamily: 'inherit',
                    type: 'bar',
                    height: height,
                    toolbar: {
                        show: false
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['30%'],
                        borderRadius: [6],
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent'],
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
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        },
                    },
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function(val) {
                            return val;
                        }
                    },
                },
                colors: [baseColor, secondaryColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
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

        // Filter: Apply button
        var applyBtn = element.closest('.card').querySelector('[data-kt-menu-dismiss="true"].btn-primary');
        var select = element.closest('.card').querySelector('select');

        if (applyBtn && select) {
            applyBtn.addEventListener('click', function() {
                var selected = Array.from(select.selectedOptions).map(o => o.value);
                var series = [];
                if (selected.includes('2') || selected.length === 0) series.push(config.data.series1);
                if (selected.includes('1') || selected.length === 0) series.push(config.data.series2);
                initChart(series);
            });
        }

        // Filter: Reset button
        var resetBtn = element.closest('.card').querySelector('button[type="reset"]');
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                $(select).val(null).trigger('change');
                initChart();
            });
        }

        // Theme mode change
        KTThemeMode.on('kt.thememode.change', function() {
            initChart();
        });

        // Select2 live change
        $(select).on('select2:select select2:unselect', function() {
            var selected = Array.from(select.selectedOptions).map(o => o.value);
            var series = [];
            if (selected.includes('2') || selected.length === 0) series.push(config.data.series1);
            if (selected.includes('1') || selected.length === 0) series.push(config.data.series2);
            initChart(series);

            var menu = element.closest('.card').querySelector('[data-kt-menu="true"]');
            if (menu) {
                KTMenu.getInstance(menu).hide();
            }
        });
    };

    window.addEventListener('load', function() {
        multiSeriesBarChart({
            elementId: 'bar-chart-id', //card body div id
            categories: ['Web', 'Mobile', 'Microsoft'],
            data: {
                series1: {
                    name: 'Total Logins',
                    data: [422255, 318180, 68842]
                },
                series2: {
                    name: 'Logins (Last 30 Days)',
                    data: [23901, 77, 27740]
                },
            },
        });
    });
</script>