<div class="modal fade" id="topicAddModal" tabindex="-1" aria-labelledby="topicAddModalLabel" data-bs-backdrop="static"
	data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="topicAddModalLabel">{{ __('Add Topic') }}</h3>
			</div>
			<div class="modal-body">
				<form method="POST" action="" class="needs-validation" novalidate id="userTopicsAddForm">
					<ul class="list-inline widget-list-inline widget-card">
						@if($topics)
						@foreach($topics as $topic)
						<li class="list-inline-item">
							<input type="checkbox" class="btn-check" id="{{$topic->slug}}" autocomplete="off"
								name="topic" value="{{$topic->id}}">
							<label class="btn btn-outline-main" for="{{$topic->slug}}">{{$topic->name}}</label>
						</li>
						@endforeach
						@endif
					</ul>
				</form>
			</div>
			<div class="modal-footer d-block px-4">
				<div class="d-flex justify-content-center">
					<button class="btn btn-main col-7" type="submit" value="topicAdd" name="form_type"
						id="userTopicsAddBtn">{{ __('Submit') }}</button>
				</div>
			</div>
		</div>
	</div>
</div>