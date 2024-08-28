<x-main-layout title="Genres">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="{{ route('genres.create') }}">Add Genre</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Genres</th>
                <th>Created at</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($genres as $row)
                <tr>
                    <td>{{ $loop->iteration }}
                    <td>{{ $row->genre}}</td>
                    <td>{{$row->created_at}}</td>
                    <td>
                        <a href="{{ route('genres.edit',$row->id)}}" class="btn btn-secondary me-3">Edit</a>
                        <form method="post" action="{{route('genres.destroy', $row->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin dihapus?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $genres->links() }}
    </div>
</x-main-layout>
