<table>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->pages }}</td>
    </tr>
    @endforeach
</table>