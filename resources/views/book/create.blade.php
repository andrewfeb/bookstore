<x-main-layout title="Books">
    <div class="mb-3">
        <h3>Add Book</h3>
    </div>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title')is-invalid @enderror"
                value={{ old('title') }}>
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control @error('isbn')is-invalid @enderror"
                    maxlength="13" value={{ old('isbn') }}>
                @error('isbn')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="publish-date" class="form-label">Publish date</label>
                <input type="date" name="publish-date"
                    class="form-control @error('publish-date')is-invalid @enderror" value={{ old('publish-date') }}>
                @error('publish-date')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" class="form-control @error('author')is-invalid @enderror"
                    value={{ old('author') }}>
                @error('author')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="publisher" class="form-label">Publisher</label>
                <select class="form-select @error('publisher') is-invalid @enderror" name="publisher">
                    <option>Select</option>
                </select>
                @error('publisher')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="genre" class="form-label">Genre</label>
                <select class="form-select @error('genre') is-invalid @enderror" name="genre[]" multiple>
                    <option>Fantasy</option>
                    <option>Horror</option>
                </select>
                @error('genre')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control @error('price')is-invalid @enderror"
                    value={{ old('price') }}>
                @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="file" name="cover" class="form-control @error('cover')is-invalid @enderror"
                value={{ old('cover') }}>
            @error('cover')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('books.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</x-main-layout>
