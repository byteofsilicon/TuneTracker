<!-- album List -->
<table id="albumsTable" class="table table-striped table-hover">
	<thead>
 		<tr>
			<th>Name</th>
			<th>Band</th>
			<th>Recorded Date<htd>
			<th>Release Date<htd>
			<th>Number of tracks</td>
			<th>Label</th>
			<th>Producer</th>
			<th>Genre</th>
 		</tr>
	</thead>
	<tbody>
		@foreach ($albums as $album)
	  	<tr>
			<td>{{ $album->name }} </td>
			<td>{{ $album->band->name }}</td>
			<td>
				@if (!is_null($album->recorded_date))
					{{ \Carbon\Carbon::createFromFormat('Y-m-d', $album->recorded_date)->format('m/d/Y') }}
				@endif
			<td>
				@if (!is_null($album->release_date))
					{{ \Carbon\Carbon::createFromFormat('Y-m-d', $album->release_date)->format('m/d/Y') }}
				@endif
			</td>
			<td>{{ $album->number_of_tracks }} </td>
			<td>{{ $album->label }} </td>
			<td>{{ $album->producer }} </td>
			<td>{{ $album->genre }} </td>
			<td>
			    <a href="{{ URL::route('albums.edit', $album->id) }}" title="Edit album"><i class="material-icons">&#xE254;</i></a>
				<a href="{{ URL::route('albums.destroy', $album->id) }}" class="delete-btn" title="Delete album"><i class="material-icons">&#xE92B;</i></a>
			</td>
	  	</tr>
		@endforeach
	</tbody>
</table>