<?php

namespace App\Exports;

use App\PhieuBanHangModel;
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

class PhieuBaoHanhExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $RowID = DB::table('tbl_phieubamhang')
                    ->orderBy('ID','DESC')
                    ->first();
        $ID = $RowID->ID;

        $phieubanhang = DB::table('tbl_phieubamhang')
                        ->join('tbl_khachhang', 'tbl_khachhang.ID', '=', 'tbl_phieubamhang.KhachHangID')
                        ->join('tbl_nhanvien', 'tbl_nhanvien.ID', '=', 'tbl_phieubamhang.NhanVienID')
                        ->select('tbl_phieubamhang.*', 'tbl_khachhang.HoTen as khachhang', 'tbl_khachhang.DiaChi as diachi', 'tbl_khachhang.DienThoai as sodienthoai','tbl_nhanvien.HoTen as nhanvien')
                        ->where('tbl_phieubamhang.ID', $ID)
                        ->first();
        $chitietphieubanhang = DB::table('tbl_chitietphieubanhang')
                        ->join('tbl_danhmucsanpham', 'tbl_danhmucsanpham.ID', '=', 'tbl_chitietphieubanhang.SanPhamID')
                        ->where('tbl_chitietphieubanhang.PhieuBanHangID', $ID)
                        ->get();
        return view('excel.phieubaohanh')
                ->with([
                    'phieubanhang'=>$phieubanhang,
                    'chitietphieubanhang'=>$chitietphieubanhang,
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
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT],
                ]);
                $event->sheet->getStyle('A8:F8')->applyFromArray([
                    'font' => [
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                ]);
                $event->sheet->getStyle('A9:F9')->applyFromArray([
                    'font' => [
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                ]);
                $event->sheet->getStyle('A10:F10')->applyFromArray([
                    'font' => [
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                ]);
                $event->sheet->getStyle('A12:F12')->applyFromArray([
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
                $event->sheet->getStyle('A12:F12')->applyFromArray([
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
                $event->sheet->getStyle('A13:F13')->applyFromArray([
                    'font' => [
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
                $event->sheet->getStyle('A14:F14')->applyFromArray([
                    'font' => [
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
                $event->sheet->getStyle('A15:F15')->applyFromArray([
                    'font' => [
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
                $event->sheet->getStyle('A17:F17')->applyFromArray([
                    'font' => [
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                ]);
                $event->sheet->getStyle('A18:F18')->applyFromArray([
                    'font' => [
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                ]);
                $event->sheet->getStyle('A20:F20')->applyFromArray([
                    'font' => [
                        'size' => 12,
                        'name' => 'Cambria',
                    ],
                ]);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(30);
                $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('8')->setRowHeight(21);
                $event->sheet->getDelegate()->getRowDimension('9')->setRowHeight(1);
                $event->sheet->getDelegate()->getRowDimension('10')->setRowHeight(21);
                $event->sheet->getDelegate()->getRowDimension('12')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('13')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('14')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('15')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('17')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('18')->setRowHeight(23);
                $event->sheet->getDelegate()->getRowDimension('19')->setRowHeight(50);
            },
            
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 
            'B' => 30,
            'C' => 14,
            'D' => 20,    
            'E' => 20,   
            'F' => 20,  
        ];
    }
}
