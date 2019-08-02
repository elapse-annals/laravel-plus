<?php

namespace App\Exports;

use App\Models\Tmpl;
use Maatwebsite\Excel\Concerns\FromCollection;

class TmplExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tmpl::all();
    }
}
