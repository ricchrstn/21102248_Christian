<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
 
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('merk')->latest()->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'List Data Cars',
            'data' => $cars
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
 
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merk_id' => 'required|exists:merks,id',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/car_images', $image->hashName());

        $car = Car::create([
            'merk_id' => $request->merk_id,
            'model' => $request->model,
            'color' => $request->color,
            'year' => $request->year,
            'price' => $request->price,
            'image' => $image->hashName(),
        ]);
 
        return response()->json([
            'success' => true,
            'message' => 'Data Car Berhasil Ditambahkan!',
            'data' => $car
        ], 201);
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('merk')->find($id);
        
        if (!$car) {
            return response()->json([
                'success' => false,
                'message' => 'Data Car Tidak Ditemukan!',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Mobil!',
            'data' => $car
        ]);
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        
        if (!$car) {
            return response()->json([
                'success' => false,
                'message' => 'Data Car Tidak Ditemukan!',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'merk_id' => 'required|exists:merks,id',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }
 
        if ($request->hasFile('image')) {
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/car_images', $image->hashName());
 
            //delete old image
            Storage::delete('public/car_images/' . basename($car->image));
 
            //update car with new image
            $car->update([
                'merk_id' => $request->merk_id,
                'model' => $request->model,
                'color' => $request->color,
                'year' => $request->year,
                'price' => $request->price,
                'image' => $image->hashName(),
            ]);
        } else {
            //update car without image
            $car->update([
                'merk_id' => $request->merk_id,
                'model' => $request->model,
                'color' => $request->color,
                'year' => $request->year,
                'price' => $request->price,
            ]);
        }
 
        return response()->json([
            'success' => true,
            'message' => 'Data Mobil Berhasil Diubah!',
            'data' => $car
        ]);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        
        if (!$car) {
            return response()->json([
                'success' => false,
                'message' => 'Data Car Tidak Ditemukan!',
                'data' => null
            ], 404);
        }

        //delete image
        Storage::delete('public/car_images/'.basename($car->image));
 
        //delete car
        $car->delete();
 
        return response()->json([
            'success' => true,
            'message' => 'Data Car Berhasil Dihapus!',
            'data' => null
        ]);
    }
}