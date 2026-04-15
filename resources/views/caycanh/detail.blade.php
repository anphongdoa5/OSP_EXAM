<x-cay-canh-layout>
    <x-slot name="title">
        {{ $product->ten_san_pham }}
    </x-slot>

    <div class="product-detail" style="margin: 20px 0;">
        <a href="/" style="color: #2f5d3a; text-decoration: none;">← Quay lại trang chủ</a>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px; align-items: start;">
            <!-- Product Image -->
            <div style="border: 1px solid #dbdbdb; border-radius: 5px; overflow: hidden; padding: 20px; background-color: #f9f9f9;">
                @if($product->hinh_anh)
                    <img src="{{ asset('storage/image/' . $product->hinh_anh) }}" alt="{{ $product->ten_san_pham }}" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 3px;">
                @else
                    <div style="width: 100%; height: 300px; display: flex; align-items: center; justify-content: center; color: #999;">
                        Không có ảnh
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <h1 style="color: #2f5d3a; font-size: 24px; margin-bottom: 15px;">{{ $product->ten_san_pham }}</h1>
                
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 28px; color: #f53003; font-weight: bold; margin-bottom: 10px;">
                        {{ number_format($product->gia_ban, 0, ',', '.') }} VND
                    </div>
                </div>

                <!-- Product Details -->
                <div style="background-color: #f9f9f9; padding: 15px 15px; border-radius: 5px; margin-bottom: 20px;">
                    @if($product->ten_khoa_hoc)
                        <p style="margin: 5px 0;"><strong>Tên khoa học:</strong> {{ $product->ten_khoa_hoc }}</p>
                    @endif
                    @if($product->ten_thong_thuong)
                        <p style="margin: 5px 0;"><strong>Tên thường gọi:</strong> {{ $product->ten_thong_thuong }}</p>
                    @endif
                    @if($product->do_kho)
                        <p style="margin: 5px 0;"><strong>Độ khó chăm sóc:</strong> <span style="color: #23b85c; font-weight: bold;">{{ $product->do_kho }}</span></p>
                    @endif
                    @if($product->yeu_cau_anh_sang)
                        <p style="margin: 5px 0;"><strong>Yêu cầu ánh sáng:</strong> {{ $product->yeu_cau_anh_sang }}</p>
                    @endif
                    @if($product->nhu_cau_nuoc)
                        <p style="margin: 5px 0;"><strong>Nhu cầu nước:</strong> {{ $product->nhu_cau_nuoc }}</p>
                    @endif
                    @if($product->quy_cach_san_pham)
                        <p style="margin: 5px 0;"><strong>Quy cách:</strong> {{ $product->quy_cach_san_pham }}</p>
                    @endif
                </div>

                <!-- Description -->
                @if($product->mo_ta)
                    <div style="margin-bottom: 20px;">
                        <h3 style="color: #2f5d3a; margin-bottom: 10px;">Mô tả sản phẩm</h3>
                        <p style="line-height: 1.6; color: #666;">{{ $product->mo_ta }}</p>
                    </div>
                @endif

                <!-- Add to Cart Form -->
                <form action="{{ route('add.to.cart', $product->id) }}" method="POST" style="display: flex; gap: 10px; margin-top: 20px;">
                    @csrf
                    <div style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 3px;">
                        <button type="button" onclick="decreaseQuantity()" style="background: none; border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">−</button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" style="width: 50px; text-align: center; border: none; border-left: 1px solid #ddd; border-right: 1px solid #ddd; padding: 5px;">
                        <button type="button" onclick="increaseQuantity()" style="background: none; border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">+</button>
                    </div>
                    <button type="submit" style="background-color: #23b85c; color: white; border: none; padding: 10px 30px; border-radius: 3px; cursor: pointer; font-weight: bold; flex: 1;">
                        Thêm vào giỏ hàng
                    </button>
                </form>

                @if(session('success'))
                    <div style="margin-top: 15px; padding: 10px; background-color: #d4edda; color: #155724; border-radius: 3px; border: 1px solid #c3e6cb;">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
</x-cay-canh-layout>