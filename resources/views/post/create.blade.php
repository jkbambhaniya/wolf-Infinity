@extends('layouts.app')
@section('content')
<section class="section-sm mt-0">
	<div class="container">
		<div class="row justify-content-center mt-5 max-vh-100">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="mt-4 h-25 ">
					<article class="card mb-4">
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
<script>
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
					endpoints: {
					byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
					byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
					}
				}
			},
			attaches: {
				class: AttachesTool,
				config: {
					endpoint: 'http://localhost:8008/uploadFile'
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
		data: {
			time: 1695103290015,
			blocks: [
			{
			id: "mhTl6ghSkV",
			type: "paragraph",
			data: {
			text: "Hey. Meet the new Editor. On this picture you can see it in action. Then, try a demo 🤓",} ,} ,
			{
			id: "l98dyx3yjb",
			type: "header",
			data: {
			text: "Key features",
			level: 3,} ,} ,
			{
			id: "os_YI4eub4",
			type: "list",
			data: {
			type: "unordered",
			items: [
			"It is a block-style editor",
			"It returns clean data output in JSON",
			"Designed to be extendable and pluggable with a <a href='https://editorjs.io/creating-a-block-tool'>simple API</a>",] ,} ,} ,
			{
			id: "1yKeXKxN7-",
			type: "header",
			data: {
			text: "What does it mean «block-styled editor»",
			level: 3,} ,} ,
			{
			id: "ksCokKAhQw",
			type: "paragraph",
			data: {
			text: "Classic WYSIWYG editors produce raw HTML-markup with both content data and content appearance. On the contrary, <mark class='cdx-marker'>Editor.js outputs JSON object</mark> with data of each Block.",} ,} ,
			{
			id: "XKNT99-qqS",
			type: "attaches",
			data: {
			file: {
			url: "https://drive.google.com/user/catalog/my-file.pdf",
			size: 12902,
			name: "file.pdf",
			extension: "pdf",} ,
			title: "My file",} ,} ,
			{
			id: "7RosVX2kcH",
			type: "paragraph",
			data: {
			text: "Given data can be used as you want: render with HTML for Web clients, render natively for mobile apps, create the markup for Facebook Instant Articles or Google AMP, generate an audio version, and so on.",} ,} ,
			{
			id: "eq06PsNsab",
			type: "paragraph",
			data: {
			text: "Clean data is useful to sanitize, validate and process on the backend.",} ,} ,
			{
			id: "hZAjSnqYMX",
			type: "image",
			data: {
			file: {
			url: "assets/codex2x.png",} ,
			withBorder: false,
			withBackground: false,
			stretched: true,
			caption: "CodeX Code Camp 2019",} ,} ,] ,
		}
	})

	document.querySelector('#test').addEventListener('click', () => {
		console.log(editor)
		editor.save().then((outputData) => {
			console.log('Article data: ', outputData)
		})
	})

	// A $( document ).ready() block.
	$( document ).ready(function() {
		class Header {
			constructor({data, api}){
				this.api = api;
				this.button = document.createElement('div');
			}

			myMethod() {
				this.api.listeners.on(this.button, 'click', () => {
				console.log('Button clicked!');
				}, false);
			}
		}
		
	});
		
</script>
@endsection