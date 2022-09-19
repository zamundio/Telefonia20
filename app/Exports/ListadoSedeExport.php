<?php

namespace App\Exports;

use App\ListadoSede;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ListadoSedeExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return ListadoSede::all();
    }
    public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Departamento',
            'Abrev',
            'Numero',
            'Observaciones'
        ];
    }
}
