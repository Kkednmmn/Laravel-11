@extends('profiles.layout')
@include('profiles.navbar')
@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Lockin system</h2>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('profiles.create') }}">
                    <i class="fa fa-plus"></i> Create New Profile
                </a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profiles as $profile)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="/images/{{ $profile->image }}" width="100px"></td>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->email }}</td>
                            <td>
                                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('profiles.show', $profile->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    <a class="btn btn-primary btn-sm" href="{{ route('profiles.edit', $profile->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">There are no data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $profiles->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
