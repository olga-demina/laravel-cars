<?php

namespace App\Http\Controllers\Api;

use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request) {
        dd($request->all());
        $items_per_page = $request->items_per_page ? $request->items_per_page : 6;
        $cars = Car::paginate($items_per_page);
        return response()->json([
            'success' => true,
            'results' => $cars
        ]);
    }
}
