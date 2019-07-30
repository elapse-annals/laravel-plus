<?php

namespace App\Exports;

use App\Models\Temp;
use Maatwebsite\Excel\Concerns\FromCollection;

class TempExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Temp::all();
    }
}
