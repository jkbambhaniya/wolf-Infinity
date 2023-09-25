<div class="widget">
	<h4 class="widget-title"><span>Topics</span></h4>
	<ul class="list-inline widget-list-inline widget-card">
		@if($topics)
		@foreach($topics as $topic)
		<li class="list-inline-item"><a href="tags.html">{{$topic->name}}</a></li>
		@endforeach
		@endif
	</ul>
</div>