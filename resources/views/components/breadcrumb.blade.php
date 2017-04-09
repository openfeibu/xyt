<p style="color: #51B837">
 	@foreach($breadcrumbs as $index => $breadcrumb)
 		@if($index == count($breadcrumbs) -1 )
	        <strong>{{ $breadcrumb['name'] }}</strong>
	    @else
	        <a href="{{ $breadcrumb['url'] }}">
	            <span>{{ $breadcrumb['name'] }} >></span>  
	        </a>
        @endif
 	@endforeach
</p>