<?php

use App\Optional;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OptionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $optionals = [
            'Parcheggio assistito',
            'Accendi sigari',
            'Cerchi in lega',
            'Sedili riscaldati'
        ];

        foreach ($optionals as $optional) {
            $new_optional = new Optional();
            $new_optional->name = $optional;
            $new_optional->slug = Str::slug($optional);
            $new_optional->save();
        }
    }
}
