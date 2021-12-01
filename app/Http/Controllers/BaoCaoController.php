<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\BaoCaoTonQuyExport;

class BaoCaoController extends Controller
{
    public function BaoCaoTonQuy()
    {
        $tondaungay = DB::table('tbl_tonquy')
                    ->orderBy('ID','DESC')
                    ->first()
                    ->TonCuoiNgay;

        if (!DB::table('tbl_tonquy')->where('Ngay',date('Y-m-d'))->exists())
        {
            DB::table('tbl_tonquy')->insert([
                'Thang'=>date('m-Y'),
                'Thu'=>0,
                'Chi'=>0,
                'TonDauNgay'=>$tondaungay,
                'TonCuoiNgay'=>$tondaungay,
            ]);
        }
        $tonquy = DB::table('tbl_tonquy')
                ->where('Thang', date('m-Y'))
                ->get();
        return view('baocao.baocaotonquy')
            ->with([
                'tonquy'=>$tonquy,
            ]);
    }
    public function InBaoCaoTonQuy()
    {
        return Excel::download(new BaoCaoTonQuyExport, 'BaoCaoTonQuyThang11-2021.xlsx'); 
      
    }
}
