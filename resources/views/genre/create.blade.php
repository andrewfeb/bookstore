<x-main-layout title="Genres">
    <div class="mb-3">
        <h3>Add Genre</h3>
    </div>
    <form method="POST" action="{{ route('genres.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama-genre" class="form-label">Genre Name</label>
            <input type="text" name="nama-genre" class="form-control @error('nama-genre')is-invalid @enderror" value={{ old('nama-genre') }}>
            @error('nama-genre')
                <span class="invalid-feedback">{{ $message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('genres.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</x-main-layout>
