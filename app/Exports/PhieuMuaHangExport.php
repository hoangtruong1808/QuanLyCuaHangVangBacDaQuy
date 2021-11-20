<?php

namespace App\Exports;

use App\PhieuMuaHangModel;
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

class PhieuMuaHangExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $RowID = DB::table('tbl_phieumuahang')
                    ->orderBy('ID','DESC')
                    ->first();
        $ID = $RowID->ID;

        $phieumuahang = DB::table('tbl_phieumuahang')
                        ->join('tbl_khachhang', 'tbl_khachhang.ID', '=', 'tbl_phieumuahang.KhachHangID')
                        ->join('tbl_nhanvien', 'tbl_nhanvien.ID', '=', 'tbl_phieumuahang.NhanVienID')
                        ->select('tbl_phieumuahang.*', 'tbl_khachhang.HoTen as khachhang', 'tbl_khachhang.DiaChi as diachi', 'tbl_khachhang.DienThoai as sodienthoai','tbl_nhanvien.HoTen as nhanvien')
                        ->where('tbl_phieumuahang.ID', $ID)
                        ->first();
        $chitietphieumuahang = DB::table('tbl_chitietphieumuahang')
                        ->join('tbl_danhmucsanpham', 'tbl_danhmucsanpham.ID', '=', 'tbl_chitietphieumuahang.SanPhamID')
                        ->where('tbl_chitietphieumuahang.PhieuMuaHangID', $ID)
                        ->get();
        return view('excel.phieumuahang')
                ->with([
                    'phieumuahang'=>$phieumuahang,
                    'chitietphieumuahang'=>$chitietphieumuahang,
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
