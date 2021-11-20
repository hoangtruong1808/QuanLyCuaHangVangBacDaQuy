<?php

namespace App\Exports;

use App\InformationAssets;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use DB;

class ExportsInformationAssets implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $data = DB::table('tbl_information_assets')
                ->leftJoin('tbl_information_group', 'tbl_information_assets.information_group', '=', 'tbl_information_group.information_id')
                ->leftJoin('tbl_form', 'tbl_information_assets.existing', '=', 'tbl_form.form_id')
                ->leftJoin('tbl_security', 'tbl_information_assets.security_level', '=', 'tbl_security.scr_id')
                ->leftJoin('tbl_department', 'tbl_information_assets.department', '=', 'tbl_department.department_id')
                ->leftJoin('tbl_business_process', 'tbl_information_assets.business_process', '=', 'tbl_business_process.bproc_id')
                ->leftJoin('tbl_property_characteristics as c1', 'tbl_information_assets.confidentiality', '=', 'c1.pchar_id')
                ->leftJoin('tbl_property_characteristics as c2', 'tbl_information_assets.integrity', '=', 'c2.pchar_id')
                ->leftJoin('tbl_property_characteristics as c3', 'tbl_information_assets.availability', '=', 'c3.pchar_id')
                ->leftJoin('tbl_informationplace', 'tbl_information_assets.information_place', '=', 'tbl_informationplace.place_id')
                ->leftJoin('tbl_spot', 'tbl_information_assets.spot', '=', 'tbl_spot.spot_id')
                ->leftJoin('tbl_owner', 'tbl_information_assets.property_ownership', '=', 'tbl_owner.owner_id')
                ->select('tbl_information_assets.*', 'tbl_information_group.information_name', 'tbl_form.form_form', 'tbl_department.department_name',
                'tbl_business_process.bproc_name', 'c1.pchar_evaluate as confidentiality_evaluate', 'c2.pchar_evaluate as integrity_evaluate', 
                'c3.pchar_evaluate as availability_evaluate', 'tbl_informationplace.place_place', 'tbl_spot.spot_spot', 'tbl_owner.owner_owner',
                'tbl_security.scr_type')
                ->where('tbl_information_assets.status', '=', '1')
                ->get();
        return view('admin.reports.reports_excel_information_assets')
                ->with([
                    'information_assets'=>$data,
                    'inventory'=>DB::table('tbl_inventory')->where('inventory_assets_type','Tài sản thông tin')->orderBy('inventory_id', 'desc')->first(),
                ]);
    }

    public function registerEvents(): array
    {
        // 'fill' => [
        //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        //     'color' => ['argb' => "#16365C"]
        // ]
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:H1')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 18,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                    
                ]);

                $event->sheet->getStyle('B3:B5')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                    'font' => [
                        'size' => 11,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('C3:C5')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                    'font' => [
                        'size' => 11,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('E3:E5')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                    'font' => [
                        'size' => 11,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('F3:F5')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                    'font' => [
                        'size' => 11,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('G3:G5')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                    'font' => [
                        'size' => 11,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('H3:H5')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                    'font' => [
                        'size' => 11,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);

                $event->sheet->getStyle('J1:M1')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('K2:M2')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('K3:M3')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('K4:M4')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('K5:M5')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);

                $event->sheet->getStyle('J2')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "DAEEF3"]
                    ]
                ]);
                $event->sheet->getStyle('J3')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "00B050"]
                    ]
                ]);
                $event->sheet->getStyle('J4')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "FFFF00"]
                    ]
                ]);
                $event->sheet->getStyle('J5')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "FF0000"]
                    ]
                ]);

                $event->sheet->getStyle('O1:R1')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('P2:R2')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('P3:R3')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);
                $event->sheet->getStyle('P4:R4')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => '16365C'),
                    ],
                ]);

                $event->sheet->getStyle('O2')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "00B050"]
                    ]
                ]);
                $event->sheet->getStyle('O3')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "FFFF00"]
                    ]
                ]);
                $event->sheet->getStyle('O4')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "FF0000"]
                    ]
                ]);

                $event->sheet->getStyle('A7:Q7')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => 'FFFFFF'),
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "366092"]
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFFFF'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle('A8:Q8')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 10,
                        'name' => 'Cambria',
                        'color' => array('rgb' => 'FFFFFF'),
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "366092"]
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFFFF'],
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A7:A8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('B7:B8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('C7:C8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('D7:D8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('E7:E8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('F7:F8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('G7:G8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('H7:H8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('I7:I8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('J7:J8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('M7:M8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('N7:N8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('O7:O8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('P7:P8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('Q7:Q8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('7:100')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'wrapText' => true
                    ],
                ]);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 
            'D' => 30,
            'H' => 30,
            'Q' => 30,         
        ];
    }
}
