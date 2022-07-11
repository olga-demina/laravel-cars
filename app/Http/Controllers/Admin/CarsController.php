<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $new_car = new Car();
        $new_car->fill($form_data);
        $new_car->slug = Car::generatePostSlugFromBrandAndModel($new_car->brand, $new_car->model);
        $new_car->save();

        return redirect()->route('admin.cars.show', ['car' => $new_car->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $car = Car::findOrFail($id);
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $car = Car::findOrFail($id);

        if ($form_data['brand'] != $car->brand || $form_data['model'] != $car->model) {
            $car->slug = Car::generatePostSlugFromBrandAndModel($form_data['brand'], $form_data['model']);
        }

        $car->update($form_data);

        return redirect()->route('admin.cars.show', ['car' => $car->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    private function getValidationRules() {
        return [
            'brand' => 'required|max:50',
            'model' => 'required|max:225',
            'cc' => 'required|max:10',
            'doors' => 'required|digits_between:1,5',
            'image' => 'required',
            'registration_date' => 'date_format:Y-m-d'
        ];
    }
}
