<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        if (\Schema::hasTable('materials')) {
            factory(\App\Material::class)->times(25)->create();
        }
    }
}
