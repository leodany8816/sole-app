<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="pdf/css/pdf-style.css">
        <title>PDF LIBROS</title>
    </head>
    <body>
        <div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Libros</th>
                        <th>Lenguaje</th>
                        <th>N.Paginas</th>
                        <th>Fecha publicación</th>
                    </tr>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->language}}</td>
                            <td>{{$book->page}}</td>
                            <td>{{ date('d/m/Y', strtotime(str_replace('-', '/', $book->created_at)))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    <body>
</html>
    