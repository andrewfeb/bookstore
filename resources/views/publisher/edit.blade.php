<x-main-layout title="Publishers">
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
    <div class="mb-3">
        <h3>Edit Publisher</h3>
    </div>
    <form method="POST" action="{{ route('publishers.update', $publisher->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama-publisher" class="form-label">Publisher Name</label>
            <input type="text" name="nama-publisher" class="form-control @error('nama-publisher')is-invalid @enderror" value={{ $publisher->publisher }}>
            @error('nama-publisher')
                <span class="invalid-feedback">{{ $message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('publishers.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</x-main-layout>
