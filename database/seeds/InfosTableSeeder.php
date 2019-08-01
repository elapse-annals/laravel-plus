<?php

use Illuminate\Database\Seeder;
use App\Models\Info;

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
