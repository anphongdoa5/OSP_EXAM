<x-cay-canh-layout>
    <x-slot name="title">
        Giỏ hàng
    </x-slot>

    <div class="cart-section" style="margin: 40px auto; max-width: 900px;">
        <h2 style="text-align: center; color: #2196F3; font-size: 24px; margin-bottom: 30px;">DANH SÁCH SẢN PHẨM</h2>

        @if(session('success'))
            <div style="margin-bottom: 20px; padding: 15px; background-color: #d4edda; color: #155724; border-radius: 3px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart ?? []) > 0)
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                <thead>
                    <tr style="background-color: #f5f5f5; border-bottom: 2px solid #ddd;">
                        <th style="padding: 12px; text-align: center; color: #333; font-weight: bold; width: 5%;">STT</th>
                        <th style="padding: 12px; text-align: left; color: #333; font-weight: bold;">Tên sản phẩm</th>
                        <th style="padding: 12px; text-align: right; color: #333; font-weight: bold; width: 12%;">Số lượng</th>
                        <th style="padding: 12px; text-align: right; color: #333; font-weight: bold; width: 15%;">Đơn giá</th>
                        <th style="padding: 12px; text-align: center; color: #333; font-weight: bold; width: 10%;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPrice = 0; $stt = 1; @endphp
                    @foreach($cart as $productId => $item)
                        @php $totalPrice += $item['gia_ban'] * $item['quantity']; @endphp
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px; text-align: center; color: #333;">{{ $stt }}</td>
                            <td style="padding: 12px; text-align: left; color: #333;">{{ $item['ten_san_pham'] }}</td>
                            <td style="padding: 12px; text-align: right; color: #333;">{{ $item['quantity'] }}</td>
                            <td style="padding: 12px; text-align: right; color: #333;">{{ number_format($item['gia_ban'], 0, '.') }}đ</td>
                            <td style="padding: 12px; text-align: center;">
                                <a href="{{ route('cart.remove', $productId) }}" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này?')" style="background-color: #f53003; color: white; padding: 6px 16px; border-radius: 3px; text-decoration: none; cursor: pointer; font-weight: bold; display: inline-block; font-size: 13px;">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                        @php $stt++; @endphp
                    @endforeach
                </tbody>
            </table>

            <!-- Summary Section -->
            <div style="text-align: center;">
                <div style="margin-bottom: 20px; padding-top: 15px; border-top: 2px solid #ddd;">
                    <div style="display: flex; justify-content: center; align-items: center; gap: 40px;">
                        <strong style="color: #333; font-size: 16px;">Tổng cộng</strong>
                        <span style="color: #333; font-size: 16px; font-weight: bold;">{{ number_format($totalPrice, 0, '.') }}đ</span>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <strong style="color: #333; font-size: 16px; display: block; margin-bottom: 10px;">Hình thức thanh toán</strong>
                    <form action="{{ route('checkout') }}" method="POST" style="display: flex; justify-content: center; align-items: center; gap: 15px;">
                        @csrf
                        <select name="payment_method" style="padding: 8px 15px; border: 1px solid #ddd; border-radius: 3px; background-color: white; color: #333; font-size: 14px; min-width: 200px;">
                            <option value="cod">Tiền mặt</option>
                            <option value="bank">Chuyển khoản ngân hàng</option>
                            <option value="online">Thanh toán trực tuyến</option>
                        </select>
                        <button type="submit" style="background-color: #2196F3; color: white; border: none; padding: 10px 35px; border-radius: 3px; cursor: pointer; font-weight: bold; font-size: 15px;">
                            ĐẶT HÀNG
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div style="text-align: center; padding: 60px 20px; background-color: #f9f9f9; border-radius: 5px;">
                <p style="color: #999; font-size: 16px; margin-bottom: 20px;">Giỏ hàng của bạn đang trống</p>
                <a href="/" style="background-color: #23b85c; color: white; padding: 12px 25px; border-radius: 3px; text-decoration: none; cursor: pointer; display: inline-block;">
                    Quay lại mua hàng
                </a>
            </div>
        @endif
    </div>
</x-cay-canh-layout>