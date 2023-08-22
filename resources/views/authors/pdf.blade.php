<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="pdf/css/pdf-style.css">
        <title>PDF Autores</title>
    </head>
    <body>
        <div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Pais</th>
                    </tr>
                    <tbody>
                        @foreach($authors as $author)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$author->full_name}}</td>
                            <td>{{ date('d/m/Y', strtotime(str_replace('-', '/', $author->created_at)))}}</td>
                            <td>{{$author->country}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    <body>
</html>
    