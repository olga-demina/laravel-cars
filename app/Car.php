<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'cc',
        'doors',
        'image',
        'registration_date'
    ];

    public static function generatePostSlugFromBrandAndModel($brand, $model) {
        $base_slug = Str::slug($brand . '-' . $model); 
        $slug = $base_slug; 
        $count = 1;
        $car_found = Car::where('slug', '=', $slug)->first();
        while ($car_found) {
            $slug = $base_slug . '-' . $count;
            $car_found = Car::where('slug', '=', $slug)->first();
            $count++;
        }
        return $slug;
    }
}
