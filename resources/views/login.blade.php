<x-main-layout title="Login">
    <div>
        <form method="post" action="{{route('login')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" value={{ old('email') }}>
                @error('email')
                    <span class="invalid-feedback">{{ $message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
        </form>
    </div>
</x-main-layout>
