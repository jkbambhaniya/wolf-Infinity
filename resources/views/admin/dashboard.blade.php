@extends('layouts.admin.app')

@section('content')
{{-- <!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10 justify-content-center">
	<!--begin::Col-->
	<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
		<div class="mb-15">
			<!--begin::Title-->
			<h1 class="fs-3x text-dark mb-6">Coming Soon</h1>
			<!--end::Title-->
		</div>
	</div>
</div>
<!--end::Row--> --}}


<x-admin.flash-message></x-admin.flash-message>

<!--begin::Row-->
<div class="row g-5 g-xl-8">
	<div class="col-xl-3">

		<!--begin::Statistics Widget 5-->
		<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<i class="ki-duotone ki-chart-simple text-primary fs-2x ms-n1"><span class="path1"></span><span
						class="path2"></span><span class="path3"></span><span class="path4"></span></i>

				<div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
					500M$
				</div>

				<div class="fw-semibold text-gray-400">
					SAP UI Progress </div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>

	<div class="col-xl-3">

		<!--begin::Statistics Widget 5-->
		<a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<i class="ki-duotone ki-cheque text-gray-100 fs-2x ms-n1"><span class="path1"></span><span
						class="path2"></span><span class="path3"></span><span class="path4"></span><span
						class="path5"></span><span class="path6"></span><span class="path7"></span></i>

				<div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
					+3000
				</div>

				<div class="fw-semibold text-gray-100">
					New Customers </div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>

	<div class="col-xl-3">

		<!--begin::Statistics Widget 5-->
		<a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<i class="ki-duotone ki-briefcase text-gray-100 fs-2x ms-n1"><span class="path1"></span><span
						class="path2"></span></i>

				<div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
					$50,000
				</div>

				<div class="fw-semibold text-gray-100">
					Milestone Reached </div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>

	<div class="col-xl-3">

		<!--begin::Statistics Widget 5-->
		<a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<i class="ki-duotone ki-chart-pie-simple text-gray-100 fs-2x ms-n1"><span class="path1"></span><span
						class="path2"></span></i>

				<div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
					$50,000
				</div>

				<div class="fw-semibold text-gray-100">
					Milestone Reached </div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>
</div>
<!--end::Row-->

<!--begin::Row-->
<div class="row g-5 g-xl-8">
	<div class="col-xl-4">

		<!--begin::Statistics Widget 4-->
		<div class="card card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body p-0">
				<div class="d-flex flex-stack card-p flex-grow-1">
					<span class="symbol  symbol-50px me-2">
						<span class="symbol-label bg-light-info">
							<i class="ki-duotone ki-basket fs-2x text-info"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span><span class="path4"></span></i>
						</span>
					</span>

					<div class="d-flex flex-column text-end">
						<span class="text-dark fw-bold fs-2">+256</span>

						<span class="text-muted fw-semibold mt-1">Sales Change</span>
					</div>
				</div>

				<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="info"
					style="height: 150px"></div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Statistics Widget 4-->
	</div>

	<div class="col-xl-4">

		<!--begin::Statistics Widget 4-->
		<div class="card card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body p-0">
				<div class="d-flex flex-stack card-p flex-grow-1">
					<span class="symbol  symbol-50px me-2">
						<span class="symbol-label bg-light-success">
							<i class="ki-duotone ki-bank fs-2x text-success"><span class="path1"></span><span
									class="path2"></span></i> </span>
					</span>

					<div class="d-flex flex-column text-end">
						<span class="text-dark fw-bold fs-2">750$</span>

						<span class="text-muted fw-semibold mt-1">Weekly Income</span>
					</div>
				</div>

				<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="success"
					style="height: 150px"></div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Statistics Widget 4-->
	</div>

	<div class="col-xl-4">

		<!--begin::Statistics Widget 4-->
		<div class="card card-xl-stretch mb-5 mb-xl-8">
			<!--begin::Body-->
			<div class="card-body p-0">
				<div class="d-flex flex-stack card-p flex-grow-1">
					<span class="symbol  symbol-50px me-2">
						<span class="symbol-label bg-light-primary">
							<i class="ki-duotone ki-briefcase fs-2x text-primary"><span class="path1"></span><span
									class="path2"></span></i> </span>
					</span>

					<div class="d-flex flex-column text-end">
						<span class="text-dark fw-bold fs-2">+6.6K</span>

						<span class="text-muted fw-semibold mt-1">New Users</span>
					</div>
				</div>

				<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="primary"
					style="height: 150px"></div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Statistics Widget 4-->
	</div>
</div>
<!--end::Row-->
@endsection
@section('pagewise_js')
{{-- <script src="{{ asset('admin-assets/js/page_js/dashboard/dashboard.js') }}?{{ time() }}"></script> --}}
<script>
	// A $( document ).ready() block.
	$( document ).ready(function() {
		var e = document.querySelectorAll(".statistics-widget-4-chart");
		[].slice.call(e).map((function(e) {
			var t = parseInt(KTUtil.css(e, "height"));
			if (e) {
				var a = e.getAttribute("data-kt-chart-color"),
					o = KTUtil.getCssVariableValue("--bs-gray-800"),
					r = KTUtil.getCssVariableValue("--bs-" + a),
					s = KTUtil.getCssVariableValue("--bs-" + a + "-light");
				new ApexCharts(e, {
					series: [{
						name: "Net Profit",
						data: [40, 40, 30, 30, 35, 35, 50]
					}],
					chart: {
						fontFamily: "inherit",
						type: "area",
						height: t,
						toolbar: {
							show: !1
						},
						zoom: {
							enabled: !1
						},
						sparkline: {
							enabled: !0
						}
					},
					plotOptions: {},
					legend: {
						show: !1
					},
					dataLabels: {
						enabled: !1
					},
					fill: {
						type: "solid",
						opacity: .3
					},
					stroke: {
						curve: "smooth",
						show: !0,
						width: 3,
						colors: [r]
					},
					xaxis: {
						categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
						axisBorder: {
							show: !1
						},
						axisTicks: {
							show: !1
						},
						labels: {
							show: !1,
							style: {
								colors: o,
								fontSize: "12px"
							}
						},
						crosshairs: {
							show: !1,
							position: "front",
							stroke: {
								color: "#E4E6EF",
								width: 1,
								dashArray: 3
							}
						},
						tooltip: {
							enabled: !0,
							formatter: void 0,
							offsetY: 0,
							style: {
								fontSize: "12px"
							}
						}
					},
					yaxis: {
						min: 0,
						max: 60,
						labels: {
							show: !1,
							style: {
								colors: o,
								fontSize: "12px"
							}
						}
					},
					states: {
						normal: {
							filter: {
								type: "none",
								value: 0
							}
						},
						hover: {
							filter: {
								type: "none",
								value: 0
							}
						},
						active: {
							allowMultipleDataPointsSelection: !1,
							filter: {
								type: "none",
								value: 0
							}
						}
					},
					tooltip: {
						style: {
							fontSize: "12px"
						},
						y: {
							formatter: function(e) {
								return "$" + e + " thousands"
							}
						}
					},
					colors: [r],
					markers: {
						colors: [r],
						strokeColor: [s],
						strokeWidth: 3
					}
				}).render()
			}
		}))
	});
</script>
@endsection