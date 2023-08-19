<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Libro</th>
			<th>Lenguaje</th>
			<th>N. Paginas</th>
			<th>Fecha Publicación</th>
			<th>Raitings</th>
		</tr>
	</thead>
	<tbody>
	@php $index = 1; @endphp
	@foreach($data['books'] as $book)
	<tr>
		<td>{{ $index++ }}</td>
		<td>{{$book->title}}</td>
		<td>{{$book->language}}</td>
		<td>{{$book->page}}</td>
		<td>{{ date('d/m/Y', strtotime(str_replace('-', '/', $book->created_at)))}}</td>
	</tr>
	@foreach($book->ratings as $data)
	<td>{{$data->number_star}}</td>
	@endforeach
	@endforeach
	</tbody>
</table>