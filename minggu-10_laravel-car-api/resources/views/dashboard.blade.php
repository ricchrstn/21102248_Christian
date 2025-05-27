@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-4">Dashboard</h2>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Cars</h5>
                    <h2 class="card-text">{{ $totalCars }}</h2>
                    <p class="card-text"><small>Total registered cars</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Brands</h5>
                    <h2 class="card-text">{{ $totalBrands }}</h2>
                    <p class="card-text"><small>Available car brands</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Latest Car</h5>
                    <h2 class="card-text">{{ $latestCar->model ?? 'N/A' }}</h2>
                    <p class="card-text"><small>Most recently added</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Average Price</h5>
                    <h2 class="card-text">Rp {{ number_format($averagePrice, 0, ',', '.') }}</h2>
                    <p class="card-text"><small>Average car price</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Cars -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Cars</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>Year</th>
                                    <th>Price</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentCars as $car)
                                <tr>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->merk->name }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>Rp {{ number_format($car->price, 0, ',', '.') }}</td>
                                    <td>{{ $car->created_at->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
