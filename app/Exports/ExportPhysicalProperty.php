<?php

namespace App\Exports;

use App\PhysicalProperty;
use App\PhysicalGroup;
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

class ExportPhysicalProperty implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('admin.reports.reports_excel_physical_property', [
            'physical_property' => DB::table('tbl_physical_property')
                                        ->select('tbl_physical_group.physical_name as physical_group_name', 
                                                    'tbl_physical_property.physical_name as physical_name',
                                                    'tbl_physical_property.physical_id as physical_id', 'physical_mac_ip_address',
                                                    'tbl_department.department_name as department_name', 'user',
                                                    'tbl_business_process.bproc_name as bproc_name',
                                                    'tbl_owner.owner_owner as owner_owner', 'physical_information_security_zone',
                                                    'c1.pchar_evaluate as pchar_evaluate1', 'physical_puspose', 'physical_type_info',
                                                    'c2.pchar_evaluate as pchar_evaluate2',
                                                    'c3.pchar_evaluate as pchar_evaluate3', 'physical_level_importance',
                                                    'tbl_location.lct_location as lct_location',
                                                    'tbl_status.status_name as status_name', 'physical_allowed_bring_outside',
                                                    'tbl_rangeusable.range_usable as range_usable', 'physical_repair_history', 'physical_description',
                                                    'tbl_operating_system.os_name as os_name', 'physical_os_lisence', 'physical_previous_user',
                                                    'tbl_antivirus.atv_name as atv_name', 'physical_antivirus_lisence', 'physical_network', 'physical_price',
                                                    'tbl_backup.backup_frequency as backup_frequency', 'physical_server_backup', 'physical_purchase_date',
                                                    'tbl_maintains.maintains_frequency as maintains_frequency', 'physical_serial_no', 'physical_config'
                                                )
                                        ->join('tbl_physical_group', 'tbl_physical_property.physical_group', '=', 'tbl_physical_group.physical_id')
                                        ->join('tbl_department', 'tbl_physical_property.physical_department', '=', 'tbl_department.department_id')
                                        ->join('tbl_business_process', 'tbl_physical_property.physical_business_process', '=', 'tbl_business_process.bproc_id')
                                        ->join('tbl_owner', 'tbl_physical_property.physical_property_ownership', '=', 'tbl_owner.owner_id')
                                        ->join('tbl_property_characteristics as c1', 'tbl_physical_property.physical_confidentiality', '=', 'c1.pchar_id')
                                        ->join('tbl_property_characteristics as c2', 'tbl_physical_property.physical_integrity', '=', 'c2.pchar_id')
                                        ->join('tbl_property_characteristics as c3', 'tbl_physical_property.physical_availability', '=', 'c3.pchar_id')
                                        ->join('tbl_location', 'tbl_physical_property.physical_location', '=', 'tbl_location.lct_id')
                                        ->join('tbl_status', 'tbl_physical_property.physical_status', '=', 'tbl_status.status_id')
                                        ->join('tbl_rangeusable', 'tbl_physical_property.physical_scope_of_use', '=', 'tbl_rangeusable.range_id')
                                        ->join('tbl_operating_system', 'tbl_physical_property.physical_os_type', '=', 'tbl_operating_system.os_id')
                                        ->join('tbl_antivirus', 'tbl_physical_property.physical_antivirus_type', '=', 'tbl_antivirus.atv_id')
                                        ->join('tbl_backup', 'tbl_physical_property.physical_schedual_backup', '=', 'tbl_backup.backup_id')
                                        ->join('tbl_maintains', 'tbl_physical_property.physical_maintains', '=', 'tbl_maintains.maintains_id')
                                        ->get(),
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

                $event->sheet->getStyle('A7:AI7')->applyFromArray([
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
                $event->sheet->getStyle('A8:AI8')->applyFromArray([
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
                $event->sheet->getStyle('H7:H8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('I7:I8')->applyFromArray([
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
                $event->sheet->getStyle('R7:R8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('S7:S8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('T7:T8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('Y7:Y8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AB7:AB8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AC7:AC8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AD7:AD8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AE7:AE8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AF7:AF8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);

                $event->sheet->getStyle('AG7:AG8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AH7:AH8')->applyFromArray([
                    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,],
                ]);
                $event->sheet->getStyle('AI7:AI8')->applyFromArray([
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
            'D' => 15,
            'H' => 30,         
        ];
    }
}
