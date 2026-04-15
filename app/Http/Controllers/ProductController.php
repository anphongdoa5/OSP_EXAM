<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the home page with max 20 products
     */
    public function index()
    {
        $categories = DanhMuc::all();
        $products = SanPham::limit(20)->get();
        $currentCategory = null;
        
        return view('caycanh.index', compact('products', 'categories', 'currentCategory'));
    }

    /**
     * Display products by category
     */
    public function byCategory($categoryId, Request $request)
    {
        $categories = DanhMuc::all();
        $currentCategory = DanhMuc::findOrFail($categoryId);
        
        // Get products in the category
        $query = $currentCategory->sanPhams();
        
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
        
        $products = $query->get();
        
        return view('caycanh.index', compact('products', 'categories', 'currentCategory'));
    }

    /**
     * Display product details
     */
    public function show($productId)
    {
        $categories = DanhMuc::all();
        $product = SanPham::findOrFail($productId);
        
        return view('caycanh.detail', compact('product', 'categories'));
    }

    /**
     * Add product to cart
     */
    public function addToCart(Request $request, $productId)
    {
        $product = SanPham::findOrFail($productId);
        $quantity = $request->input('quantity', 1);
        
        // Get current cart from session
        $cart = session('cart', []);
        
        // Add or update product in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += intval($quantity);
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'ten_san_pham' => $product->ten_san_pham,
                'gia_ban' => $product->gia_ban,
                'hinh_anh' => $product->hinh_anh,
                'quantity' => intval($quantity),
            ];
        }
        
        session(['cart' => $cart]);
        
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    /**
     * Display cart
     */
    public function viewCart()
    {
        $categories = DanhMuc::all();
        $cart = session('cart', []);
        
        return view('caycanh.cart', compact('cart', 'categories'));
    }

    /**
     * Update cart quantity
     */
    public function updateCart(Request $request)
    {
        $cart = session('cart', []);
        $productId = $request->input('product_id');
        $quantity = intval($request->input('quantity', 1));
        
        if (isset($cart[$productId])) {
            if ($quantity > 0) {
                $cart[$productId]['quantity'] = $quantity;
            } else {
                unset($cart[$productId]);
            }
        }
        
        session(['cart' => $cart]);
        
        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật!');
    }

    /**
     * Remove product from cart
     */
    public function removeFromCart($productId)
    {
        $cart = session('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }
        
        session(['cart' => $cart]);
        
        return redirect()->back()->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng!');
    }

    /**
     * Checkout - Place order
     */
    public function checkout(Request $request)
    {
        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect('/gio-hang')->with('error', 'Giỏ hàng trống!');
        }
        
        try {
            // Clear the cart after checkout
            session(['cart' => []]);
            
            return redirect('/gio-hang')->with('success', 'Đã đặt hàng thành công!');
        } catch (\Exception $e) {
            return redirect('/gio-hang')->with('error', 'Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }
}
