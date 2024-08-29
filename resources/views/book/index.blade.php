<x-main-layout title="Books">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="{{ route('books.create') }}">Add Book</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img width="100" src="{{ asset('storage/'.$row->cover) }}" alt=""></td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->author }}</td>
                        <td>{{ $row->publisher->publisher }}</td>
                        <td>
                            <ul>
                                @foreach ($row->genres as $item)
                                    <li>{{ $item->genre }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links()}}
    </div>
</x-main-layout>
