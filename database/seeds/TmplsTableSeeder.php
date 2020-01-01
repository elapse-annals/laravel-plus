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
        ini_set('memory_limit', '512M');
        factory(Tmpl::class, 100000)
            ->create();
    }
}
