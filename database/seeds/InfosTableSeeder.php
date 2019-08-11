<?php

use App\Models\Info;
use Illuminate\Database\Seeder;

class InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Info::class, 50)
            ->create();
    }
}
