<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = ['makeup', 'bath & body', 'fragrances'];

        foreach ($cats as $cat)
        {
            factory(App\Category::class)->create([
                'name' => $cat
            ]);
        }
    }
}
