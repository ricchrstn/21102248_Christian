@extends('layout.app')

@section('title', 'User List')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Daftar User</h3>
            <div class="btn-group">
                <a href="{{ request()->url() }}" class="btn {{ !request('role') ? 'btn-primary' : 'btn-outline-primary' }}">
                    All Users ({{ $users->count() }})
                </a>
                <a href="{{ request()->url() }}?role=admin" class="btn {{ request('role') === 'admin' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Admins ({{ $users->where('role', 'admin')->count() }})
                </a>
                <a href="{{ request()->url() }}?role=user" class="btn {{ request('role') === 'user' ? 'btn-success' : 'btn-outline-success' }}">
                    Users ({{ $users->where('role', 'user')->count() }})
                </a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'success' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
