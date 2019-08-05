<?php

use Illuminate\Database\Seeder;
use App\Models\Tmpl;

class TmplsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tmpl::class, 50)
            ->create();
    }
}
