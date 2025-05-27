<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Merk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $totalBrands = Merk::count();
        $latestCar = Car::with('merk')->latest()->first();
        $averagePrice = Car::avg('price');
        $recentCars = Car::with('merk')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCars',
            'totalBrands',
            'latestCar',
            'averagePrice',
            'recentCars'
        ));
    }
} 