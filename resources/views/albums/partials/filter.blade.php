<div class="filter">
    <label for="bands">Filter by band:</label>
    <select id="albumBandFilter">
    	<option value="{{ URL::route('albums.index') }}">All Albums</option>
    	@foreach ($bands as $bandId => $band)
    		@if (Request::input('bands') == $bandId)
    			<option value='?bands={{ $bandId }}' selected>{{ $band }}</option>
    		@else
    			<option value='?bands={{ $bandId }}'>{{ $band }}</option>
    		@endif
    	@endforeach
    </select>
</div>