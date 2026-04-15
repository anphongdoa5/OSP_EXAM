<style>
input.form-control {
    width: 100%;
    margin: 0;
    box-sizing: border-box;
}

label {
    margin: 0;
}

.mb-4 {
    margin-bottom: 18px !important;
}
</style>

<x-guest-layout>
    <div style="max-width: 420px; margin: 0 auto;">
        
            <div class="logo-box mb-4">
           <img src="{{ asset('images/logo.png') }}" style="width:80px; display:block; margin:0 auto;">
            <h3 class="mt-2 text-center">ĐĂNG KÝ</h3>
            </div>


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="d-block mb-1">Họ và tên</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name') }}" required>
                <div class="text-danger small mt-1">{{ $errors->first('name') }}</div>
            </div>


            <div class="mb-4">
                <label class="d-block mb-1">Email</label>
                <input type="email" name="email"
                       class="form-control"
                       value="{{ old('email') }}" required>
                <div class="text-danger small mt-1">{{ $errors->first('email') }}</div>
            </div>

            <div class="mb-4">
                <label class="d-block mb-1">Mật khẩu</label>
                <input type="password" name="password"
                       class="form-control" required>
                <div class="text-danger small mt-1">{{ $errors->first('password') }}</div>
            </div>

            <div class="mb-4">
                <label class="d-block mb-1">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation"
                       class="form-control" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('login') }}">Đã có tài khoản?</a>

                <button type="submit" class="btn btn-success px-4">
                    Đăng ký
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>