<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller3 extends Controller
{
    public function danhsach()
    {
        // Kiểm tra nếu chưa đăng nhập thì đá sang register
        if (!Auth::check()) {
            return redirect('/register')->with('message', 'Vui lòng đăng ký!');
        }

        $products = DB::table('san_pham')
            ->where('status', 1)
            ->get();
        return view('caycanh.danhsach', compact('products'));
    }

    public function show($id)
    {
        $product = DB::table('san_pham')
            ->where('id', $id)
            ->first();

        return view('admin.products.show', compact('product'));
    }

    public function delete($id)
    {
        DB::table('san_pham')
            ->where('id', $id)
            ->update(['status' => 0]);

        return redirect('/admin/products')->with('success', 'Đã xóa');
    }

    public function create()
    {
        return view('caycanh.them'); 
    }

    public function store(Request $request)
    {
        $fileName = null;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
        }

        DB::table('san_pham')->insert([
            'ten_san_pham' => $request->ten_san_pham,
            'ten_khoa_hoc' => $request->ten_khoa_hoc,
            'ten_thong_thuong' => $request->ten_thong_thuong,
            'mo_ta' => $request->mo_ta,
            'do_kho' => $request->do_kho,
            'yeu_cau_anh_sang' => $request->yeu_cau_anh_sang,
            'nhu_cau_nuoc' => $request->nhu_cau_nuoc,
            'gia_ban' => $request->gia_ban,
            'hinh_anh' => $fileName,
            'status' => 1,
            'code' => 'SP' . time(),
        ]);

        return redirect('/admin/products')->with('success', 'Thêm cây cảnh thành công!');
    }
}