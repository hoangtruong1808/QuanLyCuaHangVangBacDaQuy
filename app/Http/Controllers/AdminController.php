<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Visitors;
use App\Product;
use App\Customer;
use App\Invoice;
use App\DetailInvoice;
session_start();

// khai báo sử dụng loginRequest
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use User;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    // v1

    public function login(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_user')->where('user_email', $admin_email)->where('user_password', $admin_password)->first();
        if($result){
            $user_ip_address = $request->ip();  
            Session::put('admin_name',$result->user_name);
            Session::put('admin_id',$result->user_id);
            Session::put('ip_address',$user_ip_address);

            $result1 = Visitors::where('status','1') -> where('user_id',$result->user_id)-> where('ip_address',$user_ip_address)->first();
            var_dump($result1);
            if($result1) {
            }  
            else {
                $visitor = new Visitors();
                $visitor->user_id = $result->user_id;
                $visitor->ip_address = $user_ip_address;
                $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                $visitor->save();
            }

            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không trùng khớp. Nhập lại!');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $user_id = Session::get('admin_id');
        $ip_address = Session::get('ip_address'); 
        Visitors::where('status','1')
                -> where('user_id',$user_id)
                -> where('ip_address',$ip_address)
                ->update(['status' => '0']);  

        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('ip_address',null);
        return Redirect::to('/admin');
    }

    // v2
    public function getLogin()
    {
        // $user = Auth::user();
        // if (Auth::check()) {
        //     // nếu đăng nhập thàng công thì 
        //     return redirect('admincp');
        // } else {
        //     return view('admin.login');
        // }


    }

    public function postLogin(LoginRequest $request)
    {
        // $login = [
        //     'email' => $request->txtEmail,
        //     'password' => $request->txtPassword,
        //     'level' => 1,
        //     'status' => 1
        // ];
        // if (Auth::attempt($login)) {
        //     return redirect('admincp');
        // } else {
        //     return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        // }
    }

    public function getLogout()
    {
        // Auth::logout();
        // return redirect()->route('getLogin');
    }

// chart statistical
    public function show_dashboard(Request $request){
        return view('admin.dashboard');

        //get ip address
        $user_ip_address = $request->ip();  
            
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            //total last month
        $visitor_of_lastmonth = Visitors::whereBetween('date_visitor',[$early_last_month,$end_of_last_month])->get(); 
        $visitor_last_month_count = $visitor_of_lastmonth->count();

            //total this month
        $visitor_of_thismonth = Visitors::whereBetween('date_visitor',[$early_this_month,$now])->get(); 
        $visitor_this_month_count = $visitor_of_thismonth->count();

            //total in one year
        $visitor_of_year = Visitors::whereBetween('date_visitor',[$oneyears,$now])->get(); 
        $visitor_year_count = $visitor_of_year->count();

            //total visitors
        $visitors = Visitors::all();
        $visitors_total = $visitors->count();

            //current online
        $visitors_current = Visitors::where('status','1')->get();  
        $visitor_count = $visitors_current->count();

        //    total 
        $product = Product::all()->count();
        $productSumInStock = Product::all()->sum('product_in_stock');
        $productSumDisplaySale = Product::all()->sum('product_display_sale');
        $order = Invoice::all()->count();
        $customer = Customer::all()->count();

        $product_sale = DetailInvoice::selectRaw('product_name, sum(product_quantity) as sum')
                        ->groupBy('product_id')
                        ->groupBy('product_name')
                        ->orderBy('sum','DESC')->take(20)->get();

        $product_sale_revenue = DetailInvoice::selectRaw('product_id, product_name, sum(product_total) as sum_total')
                        ->groupBy('product_id')
                        ->groupBy('product_name')
                        ->orderBy('sum_total','DESC')->take(20)->get();

        $detail_invoice = DetailInvoice::selectRaw('product_id, product_name, sum(product_quantity) as sum_quantity, sum(product_total) as sum_total')
                        ->groupBy('product_id')
                        ->groupBy('product_name')->get();
                        

        $product_profit_temp = array();
        $arr_profit = array();
        foreach($detail_invoice as $item) {
            
            $productCheck = Product::selectRaw('product_id, product_price')->where('product_id', $item->product_id)->first();
            $product_price = $productCheck->product_price;
            $profit = (int)$item->sum_total - ((int)$product_price * (int)$item->sum_quantity);

            //echo $item->product_name ." : " . (int)$item->sum_total." - ".(int)$product_price." * ".(int)$item->sum_quantity." = ".$profit."</br></br>";
            
            $product_profit_temp[] = array($item->product_id,$item->product_name,$profit);
            $arr_profit[] = $profit;
            
        }

        $product_profit = array();
        $count_detail_invoice = count($product_profit_temp);
        $k = 20;
        if($count_detail_invoice < 20) {
            $k = $count_detail_invoice;
        }

        for($i = 0; $i<$k; $i++) {
            $flag_max = 0;
            $value_max = -100000000000000000;
            $flag = 0;
            
            foreach($product_profit_temp as $item) {
                
                if($item[2] >= $value_max) {
                    $value_max = $item[2];
                    $flag_max = $flag;
                    $product_profit[$i] = $item;
                }
                
                $flag++;

            }
            
            array_splice($product_profit_temp,$flag_max,1);

        }

        return view('admin.dashboard')->with(compact('visitors_total',
                                                    'visitor_count',
                                                    'visitor_last_month_count',
                                                    'visitor_this_month_count',
                                                    'visitor_year_count', 
                                                    'product', 
                                                    'productSumInStock', 
                                                    'productSumDisplaySale', 
                                                    'order', 
                                                    'customer', 
                                                    'product_sale',
                                                    'product_sale_revenue',
                                                    'product_profit'));
        
    }

    public function filter_by_date(Request $request){
    
        $from_date = $request->from_date;
        $to_date = $request->to_date;
    
       // $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
       $get = DB::table('tbl_statistical')->whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
    
        foreach($get as $key => $val){
    
            $chart_data[] = array(
    
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        return response()->json(['value'=> $chart_data]);
    
    }

    public function dashboard_filter(Request $request){
    
            // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
           // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
           // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
           // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(15)->format('d-m-Y H:i:s');
           // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->format('d-m-Y H:i:s');
    
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    
    
    
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    
        $dauthang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->startOfMonth()->toDateString();
        $cuoithang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->endOfMonth()->toDateString();
    
    
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
        if($request->dashboard_value == '7ngay'){
            $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
    
        }elseif($request->dashboard_value =='thangtruoc'){
            $get = DB::table('tbl_statistical')->whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
    
        }elseif($request->dashboard_value =='thangnay'){
            $get = DB::table('tbl_statistical')->whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
    
        }elseif ($request->dashboard_value =='thang9') {
            $get = DB::table('tbl_statistical')->whereBetween('order_date',[$dauthang9,$cuoithang9])->orderBy('order_date','ASC')->get();
    
        }else{
            $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();

        }
    
    
        foreach($get as $key => $val){
    
            $chart_data[] = array(
    
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
    
        return response()->json(['value'=> $chart_data]);
    
    }

    public function days_order(){

        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
    
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
        $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','ASC')->get();
    
        foreach($get as $key => $val){
    
           $chart_data[] = array(
            'period' => $val->order_date,
            'order' => $val->total_order,
            'sales' => $val->sales,
            'profit' => $val->profit,
            'quantity' => $val->quantity
        );
    
       }
    
       return response()->json(['value'=> $chart_data]);
    }

}
