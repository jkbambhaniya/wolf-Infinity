@if($siteSetting['site_logo'] && Storage::exists($siteSetting['site_logo']))
<img alt="Logo" class="h-150px w-400px mb-10" src="{{ Storage::url($siteSetting['site_logo']) }}" />
@else
<img alt="Logo" class="h-150px w-400px mb-10" src="{{asset('admin-assets/media/logos/custom-2.svg')}}" />
@endif