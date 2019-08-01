<?php

use Illuminate\Database\Seeder;
use App\Models\Temp;

class TempsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Temp::class, 50)
            ->create();
    }
}
