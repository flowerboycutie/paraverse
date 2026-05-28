<!-- To reuse the chart, just call it again with different config values at the end of the script -->

<!--begin::Mixed Widget 4-->
<div class="card card-xl-stretch mb-xl-8">
	<!--begin::Header-->
	<div class="card-header border-0 py-5">
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold fs-3 mb-1">TEMPLATE: Chart Title</span>
		</h3>
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body d-flex flex-column">
		<div class="flex-grow-1">
			<div class="radial-progress-chart-widget" style="height: 250px"></div> <!--card body div class, use this in the config elementSelector-->
		</div>
		<div class="flex-grow-1">
			<div class="fw-bolder fs-6"><span class="radial-chart-total"></span> <span class="text-gray-600 fw-bold">Total Accounts</span></div>
			<div class="fw-bolder fs-6"><span class="radial-chart-secondary"></span> <span class="text-gray-600 fw-bold">Never Logged In</span></div>
			<div class="fw-bolder fs-6"><span class="radial-chart-primary"></span> <span class="text-gray-600 fw-bold">Logged In At Least Once</span></div>
		</div>
	</div>
	<!--end::Body-->
</div>
<!--end::Mixed Widget 4-->

<script>
	var radialChartWidget = function(config) {
		var card = document.querySelector(config.cardSelector);

		if (!card) {
			return;
		}

		var element = card.querySelector('.radial-progress-chart-widget');

		if (!element) {
			return;
		}

		// Calculate percentage
		var percentage = Math.floor((config.primaryValue / config.totalValue) * 100);

		// Populate stat labels
		var totalEl = card.querySelector('.radial-chart-total');
		var primaryEl = card.querySelector('.radial-chart-primary');
		var secondaryEl = card.querySelector('.radial-chart-secondary');

		if (totalEl) totalEl.textContent = config.totalValue;
		if (primaryEl) primaryEl.textContent = config.primaryValue;
		if (secondaryEl) secondaryEl.textContent = config.secondaryValue;

		var initChart = function() {
			var height = parseInt(KTUtil.css(element, 'height'));
			var color = config.color || 'primary';
			var baseColor = KTUtil.getCssVariableValue('--bs-' + color);
			var lightColor = KTUtil.getCssVariableValue('--bs-' + color + '-light');
			var labelColor = KTUtil.getCssVariableValue('--bs-gray-700');

			var options = {
				series: [percentage],
				chart: {
					fontFamily: 'inherit',
					height: height,
					type: 'radialBar',
				},
				plotOptions: {
					radialBar: {
						hollow: {
							margin: 0,
							size: '65%',
						},
						dataLabels: {
							showOn: 'always',
							name: {
								show: false,
								fontWeight: '700',
							},
							value: {
								color: labelColor,
								fontSize: '30px',
								fontWeight: '700',
								offsetY: 12,
								show: true,
								formatter: function(val) {
									return val + '%';
								},
							},
						},
						track: {
							background: lightColor,
							strokeWidth: '100%',
						},
					},
				},
				colors: [baseColor],
				stroke: {
					lineCap: 'round',
				},
				labels: ['Progress'],
			};

			var chart = new ApexCharts(element, options);
			chart.render();
		};

		initChart();

		KTThemeMode.on('kt.thememode.change', function() {
			initChart();
		});
	};

	window.addEventListener('load', function() {
		<?php
		$totalAccounts      = 19276;
		$neverLoggedIn      = 2434;
		$loggedInAtLeastOnce = $totalAccounts - $neverLoggedIn;
		?>
		radialChartWidget({
			cardSelector: '.card:has(.radial-progress-chart-widget)', // card selector
			totalValue: <?= $totalAccounts ?>,
			primaryValue: <?= $loggedInAtLeastOnce ?>, // value shown in chart %
			secondaryValue: <?= $neverLoggedIn ?>,
			color: 'primary', // optional, any BS color e.g. 'success', 'danger'
		});
	});
</script>