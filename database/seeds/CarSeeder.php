<?php

use App\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars_array = config('cars');

        foreach($cars_array as $car) {
            $new_car = new Car();
            $new_car->fill($car);
            $new_car->slug = Str::slug($car['brand'] . '-' . $car['model']);
            $new_car->save();
        }
    }
}
