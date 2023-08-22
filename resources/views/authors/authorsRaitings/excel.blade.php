<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Fecha Nacimiento</th>
			<th>Pais</th>
			<th>Raitings</th>
		</tr>
	</thead>
	<tbody>
	@php $index = 1; @endphp
	@foreach($data['authors'] as $author)
	<tr>
		<td>{{ $index++ }}</td>
		<td>{{$author->full_name}}</td>
		<td>{{ date('d/m/Y', strtotime(str_replace('-', '/', $author->birth_data)))}}</td>
		<td>{{$author->country}}</td>
		@foreach($author->ratings as $data)
		<td>{{$data->number_star}}</td>
	@endforeach
	</tr>
	@endforeach
	</tbody>
</table>