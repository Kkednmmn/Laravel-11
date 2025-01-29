@extends('profiles.layout')
@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Add New Profile</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('profiles.index') }}">
                    <i class="fa fa-arrow-left"></i>Back</a>
            </div>

            <form action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name:</strong></label>
                    <input type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Name">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email:</strong></label>
                    <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email">
                    @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Image" class="form-label"><strong>Image:</strong></label>
                    <input type="file" name="image"
                    class="form-control @error('image') is-invalid @enderror"
                    >
                    @error('image')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
            </form>
        </div>
    </div>
@endsection
