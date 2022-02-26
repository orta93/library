<html>
    <head>
    </head>
    <body>
        <form method="POST" action="/books/save">
            @csrf
            <div>
                <input type="text" name="title" placeholder="Ingrese el nombre del libro"/>
                <input type="number" name="pages" placeholder="numero de paginas"/>
                <input type="text" name="ISBN" placeholder="Ingrese el ISBN"/>
                <input type="date" name="published_at" placeholder="Ingrese la fecha de publicacion"/>

                <select name="author_id">
                    <option>Seleccione un autor</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }} {{ $author->last_name }}</option>
                    @endforeach
                </select>

                <select name="editorial_id">
                    <option>Seleccione una editorial</option>
                    @foreach($editorials as $editorial)
                        <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>