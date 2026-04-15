<x-cay-canh-layout>
    <x-slot name="title">
        Quản lý sản phẩm
    </x-slot>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        #productTable {
            width: 100% !important;
            font-size: 14px;
        }

        #productTable th:last-child {
            width: 100px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #0d6efd !important;
            /* Màu xanh Bootstrap */
            color: white !important;
            border: 1px solid #0d6efd !important;
            border-radius: 4px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e9ecef !important;
            color: #0d6efd !important;
            border: 1px solid #dee2e6 !important;
        }
    </style>
    <div class="container mt-4">

        <h3 class="text-center text-primary fw-bold mb-3">
            QUẢN LÝ SẢN PHẨM
        </h3>

        <!-- Nút thêm -->
        <a href="/admin/products/create" class="btn btn-success mb-3">
            Thêm
        </a>

        <!-- Table -->
        <table id="productTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Tên khoa học</th>
                    <th>Tên thông thường</th>
                    <th>Độ khó</th>
                    <th>Yêu cầu ánh sáng</th>
                    <th>Nhu cầu nước</th>
                    <th>Giá bán</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{ $p->ten_san_pham }}</td>
                        <td>{{ $p->ten_khoa_hoc }}</td>
                        <td>{{ $p->ten_thong_thuong }}</td>
                        <td>{{ $p->do_kho }}</td>
                        <td>{{ $p->yeu_cau_anh_sang }}</td>
                        <td>{{ $p->nhu_cau_nuoc }}</td>
                        <td>{{ number_format($p->gia_ban, 0, ',', '.') }}</td>
                        <td>
                            <img src="{{ asset('storage/image/' . $p->hinh_anh) }}" width="60">
                        </td>
                        <td>
                            <a href="/admin/products/show/{{ $p->id }}" class="btn btn-sm btn-primary">Xem</a>
                            <a href="/admin/products/delete/{{ $p->id }}" class="btn btn-sm btn-danger"
                                onclick="return confirm('Xóa?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                pageLength: 10,
                language: {
                    lengthMenu: "_MENU_ entries per page",
                    search: "Search:",
                    paginate: {
                        previous: "Trước",
                        next: "Sau"
                    }
                }
            });
        });
    </script>
</x-cay-canh-layout>