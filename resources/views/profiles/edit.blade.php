@extends('profiles.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Edit Profile</h2>
        <div class="card-body">
            <form method="post" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           id="name" value="{{ old('name', $profile->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                           id="email" value="{{ old('email', $profile->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                           id="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($profile->image)
                        <img src="{{ asset('images/' . $profile->image) }}" width="100" alt="Profile Image">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Update
                </button>
            </form>
        </div>
    </div>
@endsection
