$("#kt_docs_jstree_dragdrop").on("rename_node.jstree", function (e, data) {
	if (data.node) {
		var id = data.instance.get_node(data.node).id;
		var name = data.instance.get_node(data.node).text;
		var parentId = data.instance.get_node(data.node).parent;
		var type = data.instance.get_node(data.node).icon;
		document.body.prepend(loadingEl);
		KTApp.showPageLoading();
		$.ajax({
			method: "POST",
			url: createOrUpdateUrl,
			data: {
				id: id,
				name: name,
				parent_id: parentId,
				type: type,
				_token: csrfToken,
			},
			success: function (resultData) {
				data.instance.set_id(data.node, resultData.id)
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
					// data.instance.refresh()
					// data.instance.delete_node(data.node);
					KTApp.hidePageLoading();
					loadingEl.remove();
					data.instance.edit(data.node);
				}
			},
		});
	}
}).on("delete_node.jstree", function (e, data) {
	if (data.node) {
		var id = data.instance.get_node(data.node).id;
		var name = data.instance.get_node(data.node).text;
		var parentId = data.instance.get_node(data.node).parent;
		var type = data.instance.get_node(data.node).icon;
		Swal.fire({
			text: "Are you sure you want to delete " + name + "?",
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
				$.ajax({
					method: "POST",
					url: destroyUrl,
					data: {
						id: id,
						_token: csrfToken,
					},
					success: function (resultData) {
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
							data.instance.refresh(data.node);
							KTApp.hidePageLoading();
							loadingEl.remove();
						}
					},
				});
			} else {
				data.instance.refresh(data.node);
			}
		});
	}
}).jstree({
	"core": {
		'force_text': true,
		"themes": {
			"responsive": false
		},
		// so that create works
		"check_callback": true,
		'data': {
			"dataType": "json",
			'method': "POST",
			'url': listDataUrl,
			'data': function (node) {
				return { 'id': node.id, _token: csrfToken };
			}
		}
	},
	'contextmenu': {
		'items': function (node) {
			var tmp = $.jstree.defaults.contextmenu.items();
			delete tmp.create.action;
			tmp.create.label = "New";
			tmp.create.submenu = {
				"create_folder": {
					"separator_after": true,
					"label": "Folder",
					"action": function (data) {
						var inst = $.jstree.reference(data.reference),
							obj = inst.get_node(data.reference);
						inst.create_node(obj, { type: "default" }, "last", function (new_node) {
							setTimeout(function () { inst.edit(new_node); }, 0);
						});
					}
				},
				"create_file": {
					"label": "File",
					"action": function (data) {
						var inst = $.jstree.reference(data.reference),
							obj = inst.get_node(data.reference);
						inst.create_node(obj, { type: "file" }, "last", function (new_node) {
							setTimeout(function () { inst.edit(new_node); }, 0);
						});
					}
				}
			};
			if (this.get_type(node) === "file") {
				delete tmp.create;
			}
			return tmp;
		}
	},
	"types": {
		"default": {
			"icon": "ki-solid ki-folder"
		},
		"file": {
			"icon": "ki-solid ki-note-2"
		}
	},
	"state": { "key": "demo2" },
	"plugins": ["contextmenu", "dnd", "search",
		"state", "types"]
});

var to = false;
const filterSearch = document.querySelector('[topic-table-filter="search"]');
filterSearch.addEventListener('keyup', function (e) {
	if (to) { clearTimeout(to); }
	to = setTimeout(function () {
		$('#kt_docs_jstree_dragdrop').jstree(true).search(e.target.value);
	}, 250);
});

function demo_create() {
	var ref = $('#kt_docs_jstree_dragdrop').jstree(true),
		sel = ref.get_selected();
	if (!sel.length) { return false; }
	sel = sel[0];
	sel = ref.create_node('#', { "type": "folder" }, 'last');
	if (sel) {
		ref.edit(sel);
	}
};