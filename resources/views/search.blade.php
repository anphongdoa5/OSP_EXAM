<x-cay-canh-layout>
    <x-slot name="title">
        Tìm kiếm
    </x-slot>

    <div class="products-section mt-4">

        @if(request('keyword'))
            <h3 style="color: #2f5d3a; margin-bottom: 20px;">
                Kết quả cho: "{{ request('keyword') }}"
            </h3>
        @endif

        @if(count($products ?? []) > 0)
            <div class="list-cay-canh" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 20px;">
                
                @foreach($products as $product)
                    <div class="cay-canh" style="border: 1px solid #dbdbdb; border-radius: 5px; overflow: hidden; transition: all 0.3s;">
                        
                        <!-- CLICK vào sản phẩm -->
                        <a href="{{ route('product.show', $product->id) }}" style="color: black; text-decoration: none; display: block;">
                            
                            <div style="width: 100%; height: 200px; overflow: hidden; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center;">
                                @if($product->hinh_anh)
                                    <img src="{{ asset('storage/image/' . $product->hinh_anh) }}"
                                         style="max-height: 100%; max-width: 100%; object-fit: cover;">
                                @else
                                    <div style="color: #999;">Không có ảnh</div>
                                @endif
                            </div>

                            <div style="padding: 10px;">
                                <h6 style="font-size: 13px; margin: 5px 0;">
                                    {{ $product->ten_san_pham }}
                                </h6>

                                <div style="color: #f53003; font-weight: bold; margin-bottom: 8px;">
                                    {{ number_format($product->gia_ban, 0, ',', '.') }} VND
                                </div>
                            </div>
                        </a>

                        <!-- NÚT THÊM GIỎ (đặt ngoài thẻ a để tránh lỗi click) -->
                        <div style="padding: 0 10px 10px 10px;">
                            <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        style="width: 100%; background-color: #2f5d3a; color: white; border: none; padding: 6px; border-radius: 4px; font-size: 13px;">
                                    Thêm vào giỏ
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #999;">
                <p>Không tìm thấy kết quả</p>
            </div>
        @endif

    </div>
</x-cay-canh-layout>