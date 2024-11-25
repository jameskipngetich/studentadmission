<?php

namespace App\Exports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepartmentsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Department::all();
    }

    public function headings(): array
    {
        //Define the column headers
        return [
            'id',
            'departmentname',
            'created_at',
            'updated_at'
        ];
    }
}
