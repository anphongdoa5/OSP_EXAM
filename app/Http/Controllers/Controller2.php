<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller2 extends Controller
{
    public function search(Request $request)
    {
        // Lấy keyword (tránh lỗi null)
        $keyword = $request->input('keyword', '');

        // Query sản phẩm (lọc sạch dữ liệu lỗi)
        $products = DB::table('san_pham')
            ->whereNotNull('id')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('ten_san_pham', 'like', '%' . $keyword . '%');
            })
            ->get();

        // Trả về view search
        return view('search', compact('products'));
    }
}