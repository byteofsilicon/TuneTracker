<!-- Band List -->
<table id="bandsTable" class="table table-striped table-hover">
	<thead>
 		<tr>
			<th>Name</th>
			<th>Start Date</th>
			<th>Website</th>
			<th>Still Active</th>
			<th>Actions</th>
 		</tr>
	</thead>
	<tbody>
		@foreach ($bands as $band)
	  	<tr>
			<td>{{ $band->name }}</td>
			<td>
				@if (!is_null($band->start_date))
					{{ \Carbon\Carbon::createFromFormat('Y-m-d', $band->start_date)->format('m/d/Y') }}
				@endif
			</td>
			<td>{{ $band->website }}</td>
			<td>{{ $band->still_active ? 'Yes' : 'No' }}</td>
			<td>
			    <a href="{{ URL::route('bands.edit', $band->id) }}" title="Edit Band"><i class="material-icons">&#xE254;</i></a>
				<a href="{{ URL::route('bands.destroy', $band->id) }}" class="delete-btn" title="Delete Band"><i class="material-icons">&#xE92B;</i></a>
			</td>
	  	</tr>
		@endforeach
	</tbody>
</table>