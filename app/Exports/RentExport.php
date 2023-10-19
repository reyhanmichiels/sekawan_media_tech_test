<?php

namespace App\Exports;

use App\Models\Rent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RentExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Rent::all();
    }

    public function headings(): array
    {
        // return $this->collection()->first()->keys()->toArray();
        return [
            "id",
            "vehicle_id",
            "user_rent_id",
            "user_approve_id_1",
            "user_approve_id_2",
            "approve_status_1",
            "approve_status_2",
            "status",
            "StartAt",
            "EndAt",
            "CreatedAt",
            "UpdatedAt"
        ];
    }
}
