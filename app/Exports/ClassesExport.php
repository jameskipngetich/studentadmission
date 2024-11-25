<?php

namespace App\Exports;

use App\Models\Classe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Classe::all();
    }
    public function headings(): array
    {
        //Define the column headers
        return [
            'id',
            'classname',
            'created_at',
            'updated_at'
        ];
    }
}
