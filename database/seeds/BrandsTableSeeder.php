<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Clinique', 'Collistar', 'Clarins', 'Estee Lauder'];

        foreach ($brands as $brand) {
            factory(App\Brand::class)->create([
                'name' => $brand
            ]);
        }
    }
}
