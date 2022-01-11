<?php

namespace App\Exports;

use App\Models\JoinList;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ListExport implements FromQuery, WithHeadings, WithColumnWidths, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $joinList;

    public function __construct(string $id_event)
    {
        $this->id_event = $id_event;
    }

    public function query(){
        return JoinList::query()->where('id_event', $this->id_event);
    }

    public function map($row): array
    {
        $fields = [
            $row->id,
            $row->guest_email,
            $row->guest_name,
            $row->guest_contact,
        ];

        return $fields;
    }

    public function headings(): array{
        return ["Id", "Email", "Name", "Contact No."];
    }

    public function columnWidths(): array
    {
        return [
            'A' => '3',
            'B' => '28',
            'C' => '23',
            'D' => '16',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
