<x-cay-canh-layout>
    <x-slot name="title">
        Cây cảnh
    </x-slot>

    <div class="products-section mt-4">
        @if($currentCategory)
            <h3 style="color: #2f5d3a; margin-bottom: 20px;">{{ $currentCategory->ten_danh_muc }}</h3>
        @endif
        
        <!-- Filters -->
        <div style="margin-bottom: 20px; padding: 15px; background-color: #f9f9f9; border-radius: 5px;">
            <p style="margin: 0 0 10px 0; color: #666; font-weight: normal;">Tìm kiếm theo</p>
            <div style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
                <!-- Sort buttons -->
                <div>
                    <a href="{{ $currentCategory ? route('category', $currentCategory->id) . '?' . http_build_query(array_merge(request()->query(), ['sort' => 'asc'])) : url('/?sort=asc') }}" class="btn btn-sm" style="background-color: #2f5d3a; color: white; border: none; padding: 8px 15px; border-radius: 3px; text-decoration: none; cursor: pointer;">Giá tăng dần</a>
                    <a href="{{ $currentCategory ? route('category', $currentCategory->id) . '?' . http_build_query(array_merge(request()->query(), ['sort' => 'desc'])) : url('/?sort=desc') }}" class="btn btn-sm" style="background-color: #2f5d3a; color: white; border: none; padding: 8px 15px; border-radius: 3px; text-decoration: none; cursor: pointer;">Giá giảm dần</a>
                </div>

                <!-- Easy care filter -->
                <div>
                    <a href="{{ $currentCategory ? route('category', $currentCategory->id) . '?' . http_build_query(array_merge(request()->query(), ['easy_care' => request('easy_care') == '1' ? '0' : '1'])) : url('/?easy_care=' . (request('easy_care') == '1' ? '0' : '1')) }}" class="btn btn-sm" style="background-color: {{ request('easy_care') == '1' ? '#23b85c' : '#999' }}; color: white; border: none; padding: 8px 15px; border-radius: 3px; text-decoration: none; cursor: pointer;">Dễ chăm sóc</a>
                </div>

                <!-- Shade tolerant filter -->
                <div>
                    <a href="{{ $currentCategory ? route('category', $currentCategory->id) . '?' . http_build_query(array_merge(request()->query(), ['shade_tolerant' => request('shade_tolerant') == '1' ? '0' : '1'])) : url('/?shade_tolerant=' . (request('shade_tolerant') == '1' ? '0' : '1')) }}" class="btn btn-sm" style="background-color: {{ request('shade_tolerant') == '1' ? '#23b85c' : '#999' }}; color: white; border: none; padding: 8px 15px; border-radius: 3px; text-decoration: none; cursor: pointer;">Chịu được bóng râm</a>
                </div>
            </div>
        </div>

        <!-- Products grid -->
        @if(count($products ?? []) > 0)
            <div class="list-cay-canh" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 20px;">
                @foreach($products ?? [] as $product)
                    <div class="cay-canh" style="border: 1px solid #dbdbdb; border-radius: 5px; overflow: hidden; cursor: pointer; transition: all 0.3s;">
                        <a href="{{ route('product.show', $product->id) }}" style="color: black; text-decoration: none; display: block; height: 100%;">
                            <div style="width: 100%; height: 200px; overflow: hidden; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center;">
                                @if($product->hinh_anh)
                                    <img src="{{ asset('storage/image/' . $product->hinh_anh) }}" alt="{{ $product->ten_san_pham }}" style="max-height: 100%; max-width: 100%; object-fit: cover;">
                                @else
                                    <div style="color: #999; text-align: center;">Không có ảnh</div>
                                @endif
                            </div>
                            <div style="padding: 10px;">
                                <h6 style="font-size: 13px; margin: 5px 0; line-height: 1.3; min-height: 26px;">{{ $product->ten_san_pham }}</h6>
                                <div style="color: #f53003; font-weight: bold; font-size: 14px;">{{ number_format($product->gia_ban, 0, ',', '.') }} VND</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #999;">
                <p>Không có sản phẩm nào</p>
            </div>
        @endif
    </div>
</x-cay-canh-layout>