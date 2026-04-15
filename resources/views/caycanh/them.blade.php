<x-cay-canh-layout>
    <x-slot name="title">Thêm sản phẩm</x-slot>
    <style>
        /* Tắt nút lên xuống cho Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Tắt nút lên xuống cho Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="container mt-4">
        <h3 class="text-center text-primary fw-bold mb-4">
            THÊM
        </h3>

        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="ten_san_pham" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên khoa học</label>
                        <input type="text" name="ten_khoa_hoc" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên thông thường</label>
                        <input type="text" name="ten_thong_thuong" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <textarea name="mo_ta" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Độ khó</label>
                        <input type="text" name="do_kho" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Yêu cầu ánh sáng</label>
                        <input type="text" name="yeu_cau_anh_sang" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nhu cầu nước</label>
                        <input type="text" name="nhu_cau_nuoc" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá bán</label>
                        <input type="number" name="gia_ban" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Ảnh sản phẩm</label>
                        <input type="file" name="hinh_anh" class="form-control" accept="image/*">
                    </div>

                    <div class="text-center mb-5">
                        <a href="/admin/products" class="btn btn-secondary px-4 me-2">Quay lại</a>
                        <button type="submit" class="btn btn-primary px-4">Lưu sản phẩm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-cay-canh-layout>