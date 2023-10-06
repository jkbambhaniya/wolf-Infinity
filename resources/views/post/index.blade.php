@extends('layouts.app')
@section('content')
<section class="section-sm mt-0">
	<div class="container">
		<div class="row justify-content-center mt-5 max-vh-100">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="mt-4 h-25 ">
					<article class="card mb-4 widget p-0">
						<div class="card-header align-items-center">
							<div class="d-flex justify-content-between">
								<div>
									<h5>{{Auth::user()->full_name}}</h5><span id="saveLoader">Saved.</span>
								</div>
								<div class=""><a href="post-details.html" class="btn btn-outline-main">Publish</a>
								</div>
							</div>

						</div>
						<div class="card-body">
							<form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data"
								class="needs-validation">
								@csrf
								<div class="mb-4">
									<div class="form-floating has-validation mb-2">
										<div id="editorjs"></div>
									</div>
								</div>
								<div class="d-flex gap-2 justify-content-center">
									<button type="button" name="form_type" value="edit_profile" id="test"
										class="btn btn-main w-50">Submit</button>
								</div>
							</form>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('pagewise_js')
<script src="{{asset('theme/plugins/editorjs/editorjs.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/image-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/header-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/link-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/raw-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/checklist-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/list-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/embed-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/quote-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/paragraph-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/marker-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/editorjs/attaches-bundle.min.js')}}"></script>
<script src="{{asset('theme/plugins/underscore/underscore-min.js')}}"></script>
<script>
	var postId = "{{$post->id}}";
	var editorData = {{ Js::from($post->data) }};
	const editor = new EditorJS({
		holder: 'editorjs',
		inlineToolbar: ['link', 'bold', 'italic', 'marker'],
		tools: { 
			header: {
				class: Header,
				inlineToolbar: true,
			},
			image: {
				class: ImageTool,
				config: {
					uploader: {
						uploadByFile(file){
							var myformData = new FormData();
							myformData.append('image', file);
							myformData.append('id', postId);
							myformData.append('type', 'image');
							return $.ajax({
								enctype: 'multipart/form-data',
								type: 'POST',
								dataType: 'json',
								processData: false,
								contentType: false,
								headers: { 'X-CSRF-TOKEN': csrfToken },
								url: "{{route('ajax.file.upload')}}",
								data: myformData
								}).then(function (data) {
									return {
										success: 1,
										file: {
										url: data.url
									}
								};
							});
						},
					}
				}
			},
			attaches: {
				class: AttachesTool,
				config: {
					uploader: {
						uploadByFile(file){
							var myformData = new FormData();
							myformData.append('file', file);
							myformData.append('id', postId);
							myformData.append('type', 'attaches');
							return $.ajax({
								enctype: 'multipart/form-data',
								type: 'POST',
								dataType: 'json',
								processData: false,
								contentType: false,
								headers: { 'X-CSRF-TOKEN': csrfToken },
								url: "{{route('ajax.file.upload')}}",
								data: myformData,
								error: function (jqXHR, ajaxOptions, thrownError) {
									Toast.fire({
										icon: "error",
										title:
											"<span style='color:black'>" +
											jqXHR.responseJSON.message +
											"</span>",
									});
								},
								}).then(function (data) {
									return {
										success: 1,
										file: {
										url: data.url
									}
								};
							});
						},
					}
				}
			},
			checklist: {
				class: Checklist,
				inlineToolbar: true,
			},
			list: {
				class: List,
				inlineToolbar: true,
				config: {
					defaultStyle: 'unordered'
				}
			},
			paragraph: {
				class: Paragraph,
				inlineToolbar: true,
			},
			marker: {
				class: Marker,
				shortcut: 'CMD+SHIFT+M',
				inlineToolbar: true,
			},
			raw: RawTool,
			embed: Embed,
			quote: Quote,
		},
		placeholder: 'Let`s write an awesome story!',
		data: JSON.parse(editorData),
		onChange: _.debounce(mySaveFunction, 200)
	});
	function mySaveFunction() {
		editor.save().then((outputData) => {
			$('#saveLoader').html('Saving...')
			$.ajax({
				method: "PUT",
				url: "{{route('post.update',$post->id)}}",
				data: {
					id: postId,
					data:outputData,
					_token: csrfToken
				},
				success: function (resultData) {
					$('#saveLoader').text('Saved')
				},
				error: function (jqXHR, ajaxOptions, thrownError) {
					if (jqXHR.status == 401 || jqXHR.status == 419) {
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
					}
				},
			});
		})
	}
	// A $( document ).ready() block.
	$( document ).ready(function() {
		
	});
		
</script>
@endsection