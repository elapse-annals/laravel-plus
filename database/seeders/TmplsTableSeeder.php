<?php

use App\Models\Tmpl;
use Illuminate\Database\Seeder;

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
