var UsersList = function () {
	// Define shared variables
	var table = document.getElementById('kt_table_users');
	var datatable;
	var toolbarBase;
	var toolbarSelected;
	var selectedCount;
	// Private functions
	var initUserTable = function () {
		// Set date data order
		const tableRows = table.querySelectorAll('tbody tr');
		// console.log(tableRows);
		/* if(tableRows){
			tableRows.forEach(row => {
				const dateRow = row.querySelectorAll('td');
				const joinedDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
				dateRow[3].setAttribute('data-order', joinedDate);
			});
		} */

		// Init datatable --- more info on datatables: https://datatables.net/manual/
		datatable = $(table).DataTable({
			searchDelay: 500,
			processing: true,
			serverSide: true,
			responsive: true,
			order: [[5, "desc"]],
			fnDrawCallback: function () {
				const tooltipTriggerList = document.querySelectorAll(
					'[data-bs-toggle="tooltip"]'
				);
				const tooltipList = [...tooltipTriggerList].map(
					(tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
				);
			},
			ajax: {
				url: listDataUrl,
				type: "POST",
				data: {
					// parameters for custom backend script demo
					_token: csrfToken,
				},
				beforeSend: function () {
					if (datatable != null) {
						datatable.settings()[0].jqXHR.abort();
					}
				},
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "first_name",
				},
				{
					data: "email",
				},
				{
					data: "phone",
				},
				{
					data: "status",
				},
				{
					data: "created_at",
				},
				{
					data: "actions",
					responsivePriority: -1,
					sClass: "text-end",
				},
			],
			columnDefs: [
				{
					width: "10px",
					targets: 0,
					orderable: false,
					render: function (data, type, full, meta) {
						return '<div class="form-check form-check-sm form-check-custom form-check-solid">\
						<input class="form-check-input cursor-pointer" name="checkDelete[]" type="checkbox" value="'+ data + '" />\
					</div>';
					},
				},
				{
					width: "120px",
					targets: 1,
					title: "User",
					sClass: "d-flex align-items-center",
					render: function (data, type, full, meta) {
						return '<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">\
							<a href="'+ full.show_url + '">\
								<div class="symbol-label">\
									<img src="'+ full.profile_url + '" alt="' + full.first_name + '" class="w-100">\
								</div>\
							</a>\
						</div>\
						<div class="d-flex flex-column">\
							<a href="'+ full.show_url + '" class="text-gray-800 text-hover-primary mb-1 "><span class="fw-bolder fs-4">' + full.first_name + '</span></a>\
						</div>';
					},
				},
				{
					width: "180px",
					targets: 2,
					render: function (data, type, full, meta) {
						return '<div class="d-flex align-items-center gap-2">\
								<a href="mailto:' + data + '" class="text-muted text-hover-primary">' + data + '</a>\
                			</div >';
					},
				},
				{
					width: "180px",
					targets: 3,
					render: function (data, type, full, meta) {
						return '<div class="d-flex align-items-center gap-2">\
							<a href="https://api.whatsapp.com/send?phone=' + data.replace("+", "").replace(/\s+/g, '') + '" target="_blank" class="text-muted text-hover-success">\
								<i class="ki-duotone ki-whatsapp fs-1 pt-2 ">\
									<i class="path1" ></i >\
									<i class="path2"></i>\
								</i >\
							</a >\
								<a href="tel:' + data.replace(/\s+/g, '') + '" target="_blank" class="text-muted text-hover-primary">' + data + '</a>\
                			</div >';
					},
				},
				{
					width: "75px",
					targets: -3,
					render: function (data, type, full, meta) {
						var status = {
							'inactive': {
								title: "Inactive",
								state: "danger",
							},
							'active': {
								title: "Active",
								state: "success",
							},
						};
						if (typeof status[data] === "undefined") {
							return data;
						}
						return (
							'<a href="javascript:void(0)" data-url="' +
							full.status_url +
							'" data-status="' +
							data +
							'" data-user-table-filter="status_row"><div class="badge badge-light-' +
							status[data].state +
							' fw-bold">' +
							status[data].title +
							"</div></a>"
						);
					},
				},
				{
					width: "75px",
					targets: -2,
				},
				{
					width: "120px",
					targets: -1,
					title: "Actions",
					orderable: false,
					render: function (data, type, full, meta) {
						return '<a href="' + full.edit_url + '" class="btn btn-sm btn-icon btn-light-dark" data-bs-toggle="tooltip" title="Edit">\
						<i class="ki-duotone ki-notepad-edit fs-2">\
							<i class="path1"></i>\
							<i class="path2"></i>\
						</i>\
					</a>\
					<a href="javascript:void(0);" data-id="'+ full.id + '" data-url="' + full.delete_url + '" data-user-table-filter="delete_row" class="btn btn-sm btn-icon btn-light-danger" data-bs-toggle="tooltip" title="Delete">\
						<i class="ki-duotone ki-trash fs-2">\
							<i class="path1"></i>\
							<i class="path2"></i>\
							<i class="path3"></i>\
							<i class="path4"></i>\
							<i class="path5"></i>\
						</i>\
					</a>';
					},
				},
			],
		});
		datatable.on('draw', function () {
			initToggleToolbar();
			handleDeleteRows();
			toggleToolbars();
			handleStatusRows();
		});
	}

	var handleSearchDatatable = () => {
		const filterSearch = document.querySelector('[data-user-table-filter="search"]');
		filterSearch.addEventListener('keyup', function (e) {
			datatable.search(e.target.value).draw();
		});
	}

	// Hook export buttons
	var exportButtons = () => {
		const documentTitle = 'Users Report';
		var buttons = new $.fn.dataTable.Buttons(table, {
			buttons: [
				{
					extend: 'copyHtml5',
					title: documentTitle,
					exportOptions: {
						columns: [1, 2, 3, 4, 5], // Exclude columns with class "actions"
					}
				},
				{
					extend: 'excelHtml5',
					title: documentTitle,
					exportOptions: {
						columns: [1, 2, 3, 4, 5], // Exclude columns with class "actions"
					}
				},
				{
					extend: 'csvHtml5',
					title: documentTitle,
					exportOptions: {
						columns: [1, 2, 3, 4, 5], // Exclude columns with class "actions"
					}
				},
				{
					extend: 'pdfHtml5',
					title: documentTitle,
					exportOptions: {
						columns: [1, 2, 3, 4, 5], // Exclude columns with class "actions"
					}
				}
			]
		}).container().appendTo($('#kt_datatable_example_buttons'));

		// Hook dropdown menu click event to datatable export buttons
		const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
		exportButtons.forEach(exportButton => {
			exportButton.addEventListener('click', e => {
				e.preventDefault();

				// Get clicked export value
				const exportValue = e.target.getAttribute('data-kt-export');
				const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

				// Trigger click event on hidden datatable export buttons
				target.click();
			});
		});
	}

	// Delete User
	var destroyFunctionAjax = null;
	var handleDeleteRows = () => {
		// Select all delete buttons
		const deleteButtons = table.querySelectorAll('[data-user-table-filter="delete_row"]');
		deleteButtons.forEach(d => {
			// Delete button on click
			d.addEventListener('click', function (e) {
				e.preventDefault();

				// Select parent row
				const parent = e.target.closest('tr');

				// Get user name
				const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[1].innerText;
				const id = parent.querySelectorAll('td')[5].querySelectorAll('a')[1].getAttribute('data-id');
				const url = parent.querySelectorAll('td')[5].querySelectorAll('a')[1].getAttribute('data-url');
				// SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
				Swal.fire({
					text: "Are you sure you want to delete " + userName + "?",
					icon: "warning",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Yes, delete!",
					cancelButtonText: "No, cancel",
					customClass: {
						confirmButton: "btn fw-bold btn-danger",
						cancelButton: "btn fw-bold btn-active-light-primary"
					}
				}).then(function (result) {
					if (result.value) {
						document.body.prepend(loadingEl);
						KTApp.showPageLoading();
						destroyFunctionAjax = $.ajax({
							method: "POST",
							url: url,
							data: {
								id: id,
								_method: "delete",
								_token: csrfToken,
							},
							beforeSend: function () {
								if (destroyFunctionAjax != null) {
									destroyFunctionAjax.abort();
								}
							},
							success: function (resultData) {
								datatable.row($(parent)).remove().draw();
								Toast.fire({
									icon: "success",
									title:
										"<span style='color:black'>" +
										resultData.message +
										"</span>",
								});
								KTApp.hidePageLoading();
								loadingEl.remove();
								toggleToolbars();
							},
							error: function (jqXHR, ajaxOptions, thrownError) {
								if (jqXHR.status == 401 || jqXHR.status == 419) {
									console.log(jqXHR.status);
									Swal.fire({
										title: "Session Expired",
										text: "You'll be take to the login page",
										icon: "warning",
										confirmButtonText: "Ok",
										allowOutsideClick: false,
										customClass: {
											confirmButton: "btn btn-sm btn-success",
										},
									}).then(function (result) {
										location.reload();
										return false;
									});
								} else {
									Toast.fire({
										icon: "error",
										title:
											"<span style='color:black'>" +
											jqXHR.responseJSON.message +
											"</span>",
									});
									KTApp.hidePageLoading();
									loadingEl.remove();
								}
							},
						});
					}
				});
			})
		});
	}

	// Delete User
	var statusFunctionAjax = null;
	var handleStatusRows = () => {
		// Select all delete buttons
		const statusButtons = table.querySelectorAll('[data-user-table-filter="status_row"]');
		statusButtons.forEach(d => {
			// Delete button on click
			d.addEventListener('click', function (e) {
				e.preventDefault();

				// Select parent row
				const parent = e.target.closest('tr');

				const status = parent.querySelectorAll('td')[4].querySelectorAll('a')[0].getAttribute('data-status');
				const url = parent.querySelectorAll('td')[4].querySelectorAll('a')[0].getAttribute('data-url');
				var statusLable = "In Active";
				var buttonColor = "danger";
				if (status == 0) {
					statusLable = "Active";
					buttonColor = "success";
				}
				// SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
				Swal.fire({
					text: "Are you sure you want to change status " + statusLable + "?",
					icon: "warning",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Yes, " + statusLable,
					cancelButtonText: "No, cancel",
					customClass: {
						confirmButton: "btn fw-bold btn-" + buttonColor,
						cancelButton: "btn fw-bold btn-active-light-primary"
					}
				}).then(function (result) {
					if (result.value) {
						document.body.prepend(loadingEl);
						KTApp.showPageLoading();
						statusFunctionAjax = $.ajax({
							method: "POST",
							url: url,
							data: {
								status: status,
								_token: csrfToken,
							},
							beforeSend: function () {
								if (statusFunctionAjax != null) {
									statusFunctionAjax.abort();
								}
							},
							success: function (resultData) {
								datatable.row($(parent)).draw();
								Toast.fire({
									icon: "success",
									title:
										"<span style='color:black'>" +
										resultData.message +
										"</span>",
								});
								KTApp.hidePageLoading();
								loadingEl.remove();
							},
							error: function (jqXHR, ajaxOptions, thrownError) {
								if (jqXHR.status == 401 || jqXHR.status == 419) {
									console.log(jqXHR.status);
									Swal.fire({
										title: "Session Expired",
										text: "You'll be take to the login page",
										icon: "warning",
										confirmButtonText: "Ok",
										allowOutsideClick: false,
										customClass: {
											confirmButton: "btn btn-sm btn-success",
										},
									}).then(function (result) {
										location.reload();
										return false;
									});
								} else {
									Toast.fire({
										icon: "error",
										title:
											"<span style='color:black'>" +
											jqXHR.responseJSON.message +
											"</span>",
									});
									KTApp.hidePageLoading();
									loadingEl.remove();
								}
							},
						});
					}
				});
			})
		});
	}

	// Init toggle toolbar
	var initToggleToolbar = () => {
		// Toggle selected action toolbar
		// Select all checkboxes
		const checkboxes = table.querySelectorAll('[type="checkbox"]');
		// Select elements
		toolbarBase = document.querySelector('[data-kt-user-table-toolbar="base"]');
		toolbarSelected = document.querySelector('[data-kt-user-table-toolbar="selected"]');
		selectedCount = document.querySelector('[data-kt-user-table-select="selected_count"]');
		const deleteSelected = document.querySelector('[data-kt-user-table-select="delete_selected"]');
		// Toggle delete selected toolbar
		checkboxes.forEach(c => {
			// Checkbox on click event
			c.addEventListener('click', function () {
				setTimeout(function () {
					toggleToolbars();
				}, 50);
			});
		});

		// Deleted selected rows
		deleteSelected.addEventListener('click', function () {
			// SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you want to delete selected users?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, delete!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn fw-bold btn-danger",
					cancelButton: "btn fw-bold btn-active-light-primary"
				}
			}).then(function (result) {
				if (result.value) {
					const ids = [];
					checkboxes.forEach(c => {
						if (c.checked) {
							ids.push(c.value);
						}
					});
					document.body.prepend(loadingEl);
					KTApp.showPageLoading();
					destroyFunctionAjax = $.ajax({
						method: "POST",
						url: multipleDestroyUrl,
						data: {
							ids: ids,
							_token: csrfToken,
						},
						beforeSend: function () {
							if (destroyFunctionAjax != null) {
								destroyFunctionAjax.abort();
							}
						},
						success: function (resultData) {
							// Remove all selected customers
							checkboxes.forEach(c => {
								if (c.checked) {
									datatable.row($(c.closest('tbody tr'))).remove().draw();
								}
							});

							// Remove header checked box
							const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
							headerCheckbox.checked = false;
							Toast.fire({
								icon: "success",
								title:
									"<span style='color:black'>" +
									resultData.message +
									"</span>",
							});
							KTApp.hidePageLoading();
							loadingEl.remove();
							toggleToolbars(); // Detect checked checkboxes
							initToggleToolbar(); // Re-init toolbar to recalculate checkboxes
						},
						error: function (jqXHR, ajaxOptions, thrownError) {
							if (jqXHR.status == 401 || jqXHR.status == 419) {
								console.log(jqXHR.status);
								Swal.fire({
									title: "Session Expired",
									text: "You'll be take to the login page",
									icon: "warning",
									confirmButtonText: "Ok",
									allowOutsideClick: false,
									customClass: {
										confirmButton: "btn btn-sm btn-success",
									},
								}).then(function (result) {
									location.reload();
									return false;
								});
							} else {
								Toast.fire({
									icon: "error",
									title:
										"<span style='color:black'>" +
										jqXHR.responseJSON.message +
										"</span>",
								});
								KTApp.hidePageLoading();
								loadingEl.remove();
							}
						},
					});
				}
			});
		});
	}

	// Toggle toolbars
	const toggleToolbars = () => {
		// Select refreshed checkbox DOM elements 
		const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

		// Detect checkboxes state & count
		let checkedState = false;
		let count = 0;

		// Count checked boxes
		allCheckboxes.forEach(c => {
			if (c.checked) {
				checkedState = true;
				count++;
			}
		});

		// Toggle toolbars
		if (checkedState) {
			selectedCount.innerHTML = count;
			toolbarBase.classList.add('d-none');
			toolbarSelected.classList.remove('d-none');
		} else {
			toolbarBase.classList.remove('d-none');
			toolbarSelected.classList.add('d-none');
		}
	}

	return {
		// Public functions  
		init: function () {
			if (!table) {
				return;
			}

			initUserTable();
			initToggleToolbar();
			handleSearchDatatable();
			handleDeleteRows();
			handleStatusRows();
			exportButtons();
		}
	}
}();
