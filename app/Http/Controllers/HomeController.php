<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        $categories = DanhMuc::all();
        
        // Get products with filters
        $query = SanPham::query();
        
        // Apply easy to care filter
        if ($request->has('easy_care') && $request->easy_care == '1') {
            $query->where('do_kho', 'Dễ chăm sóc');
        }
        
        // Apply shade tolerant filter
        if ($request->has('shade_tolerant') && $request->shade_tolerant == '1') {
            $query->whereRaw("yeu_cau_anh_sang LIKE '%Chịu được bóng râm%' OR yeu_cau_anh_sang LIKE '%Chịu râm mát%' OR yeu_cau_anh_sang LIKE '%Chịu bóng râm tốt%'");
        }
        
        // Apply sorting
        if ($request->has('sort')) {
            if ($request->sort == 'asc') {
                $query->orderBy('gia_ban', 'asc');
            } elseif ($request->sort == 'desc') {
                $query->orderBy('gia_ban', 'desc');
            }
        }
        
        $products = $query->limit(20)->get();
        $currentCategory = null;
        return view("caycanh.index", compact('categories', 'products', 'currentCategory'));
    }


}