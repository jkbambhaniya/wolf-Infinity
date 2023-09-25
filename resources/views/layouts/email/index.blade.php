<!DOCTYPE html>
<html lang="en">

	<head>
		<title>{{ config('app.name') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ asset('admin-assets/media/logos/favicon.png') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
	</head>
	<!--end::Head-->

	<!--begin::Body-->

	<body id="kt_body" class="app-blank">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Email template-->
			<style>
				html,
				body {
					padding: 0;
					margin: 0;
					font-family: Inter, Helvetica, "sans-serif";
				}

				a:hover {
					color: #009ef7;
				}
			</style>

			<div id="#kt_app_body_content"
				style="background-color:#ffffff; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
				<div
					style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px; border: 1px solid #52cc5c;">
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto"
						style="border-collapse:collapse">
						<tbody>
							<tr>
								<td align="center" valign="center" style="text-align:center; padding-bottom: 0px">

									<!--begin:Email content-->
									<div align="center" valign="center"
										style="text-align:center; margin:0 15px 0px 15px">
										<!--begin:Logo-->
										<div style="margin-bottom: 0px">
											<a href="{{ config('app.url') }}" rel="noopener" target="_blank">
												<img alt="Logo"
													src="{{ asset('admin-assets/media/logos/Fixr-Upper-Logo-Final-08-white.png') }}"
													style="height: 100px" />
											</a>
										</div>
										<!--end:Logo-->
									</div>
									<!--end:Email content-->
								</td>
							</tr>

							@yield('content')

							<tr>
								<td align="center" valign="center"
									style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
									<p style="margin-bottom:2px; text-align:center;"></p>
								</td>
							</tr>

							<tr>
								<td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
									<a href="mailto:#" style="margin-right:10px; text-decoration: none;">
										<img alt="Logo" src="{{ asset('admin-assets/media/email/email.png') }}" />
									</a>
									<a href="tel:#" style="margin-right:10px; text-decoration: none;">
										<img alt="Logo" src="{{ asset('admin-assets/media/email/phone-call.png') }}" />
									</a>
									<a href="#" style="margin-right:10px; text-decoration: none;">
										<img alt="Logo" src="{{ asset('admin-assets/media/email/twitter.png') }}" />
									</a>
									<a href="#" style="margin-right:10px; text-decoration: none;">
										<img alt="Logo" src="{{ asset('admin-assets/media/email/facebook.png') }}" />
									</a>
									<a href="#" style="margin-right:10px; text-decoration: none;">
										<img alt="Logo" src="{{ asset('admin-assets/media/email/instagram.png') }}" />
									</a>
									<a href="#" style="margin-right:10px; text-decoration: none;">
										<img alt="Logo" src="{{ asset('admin-assets/media/email/linkedin.png') }}" />
									</a>
								</td>
							</tr>

							<tr>
								<td align="center" valign="center"
									style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
									<p style="text-align:center;">{{ Carbon\Carbon::now()->year }} &copy;
										<a href="{{ config('app.url') }}" rel="noopener" target="_blank"
											style="font-weight: 600;font-family:Arial,Helvetica,sans-serif; color:#52cc5c">{{ config('app.name') }}</a>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!--end::Email template-->
		</div>
		<!--end::Root-->
	</body>
	<!--end::Body-->

</html>