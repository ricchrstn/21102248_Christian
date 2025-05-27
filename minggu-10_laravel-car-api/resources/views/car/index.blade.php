@extends('layouts.app')

@section('title', 'Car List')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Car Management</h2>
            <p class="text-muted">Manage your car inventory</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('car.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Car
            </a>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Color</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$car->image) }}" 
                                         class="img-thumbnail" 
                                         width="100" 
                                         alt="{{ $car->model }}">
                                </td>
                                <td>{{ $car->merk->name }}</td>
                                <td>{{ $car->model }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $car->color }}</span>
                                </td>
                                <td>{{ $car->year }}</td>
                                <td>Rp {{ number_format($car->price, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('car.show', $car->id) }}" 
                                           class="btn btn-info btn-sm" 
                                           title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('car.edit', $car->id) }}" 
                                           class="btn btn-warning btn-sm" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('car.destroy', $car->id) }}" 
                                              method="POST" 
                                              style="display:inline;"
                                              onsubmit="return confirm('Are you sure you want to delete this car?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm" 
                                                    title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection