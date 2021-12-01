<?php

namespace App\Exports;

use App\TonQuyModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use DB;

class BaoCaoTonQuyExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $baocaotonquy = DB::table('tbl_tonquy')
                    ->where('Thang', date('m-Y'))
                    ->get();
        $tondauthang = DB::table('tbl_tonquy')
                    ->where('Thang', date('m-Y'))
                    ->orderBy('ID', 'ASC')
                    ->first()
                    ->TonDauNgay;
        $tongthu =  DB::table('tbl_tonquy')
                    ->where('Thang', date('m-Y'))
                    ->sum('Thu');
        $tongchi =  DB::table('tbl_tonquy')
                    ->where('Thang', date('m-Y'))
                    ->sum('Chi');
        return view('excel.baocaotonquy')
                ->with([    
                    'baocaotonquy'=>$baocaotonquy,
                    'tondauthang'=>$tondauthang,
                    'tongthu'=>$tongthu,
                    'tongchi'=>$tongchi,
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
                $event->sheet->getStyle('A2:F2')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 17,
                        'name' => 'Cambria',
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
                $event->sheet->getStyle('A3:F3')->applyFromArray([
                    'font' => [
                        'size' => 13,
                        'name' => 'Cambria',
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
                $event->sheet->getStyle('A5:F5')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 15,
                        'name' => 'Cambria',
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
                $event->sheet->getStyle('A6:F6')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'name' => 'Cambria',
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
                $event->sheet->getStyle('A8:F8')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => "A9D0F5"]
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle('A8:F8')->applyFromArray([
                    'font' => [
                        'bold' => true, 
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(30);
                $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('8')->setRowHeight(23);
                $soluong = DB::table('tbl_tonquy')
                ->where('Thang', date('m-Y'))
                ->count();
                for($i=9; $i<=9+$soluong; $i++)
                {
                    $event->sheet->getStyle('A'.$i.':F'.$i)->applyFromArray([
                        'font' => [
                            'size' => 11,
                            'name' => 'Cambria',
                        ],
                        'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);
                    $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(20);
                }
            },
            
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 
            'B' => 30,
            'C' => 20,
            'D' => 20,    
            'E' => 20,   
            'F' => 20,  
        ];
    }
}
