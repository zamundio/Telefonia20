<?php

namespace App\Exports;

use App\ListadoFacturacion;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacturacionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ListadoFacturacion::all();
    }
}
