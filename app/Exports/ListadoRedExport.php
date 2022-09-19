<?php

namespace App\Exports;

use App\ListadoRed;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListadoRedExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ListadoRed::all();
    }
    public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Posición',
            'Responsable',
            'División',
            'Abrev',
            'Numero'
        ];
    }
}
