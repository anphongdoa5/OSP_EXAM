<x-guest-layout>

    <!-- LOGO -->
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.png') }}" width="100">
    </div>

    <!-- TIÊU ĐỀ -->
    <h2 class="text-center text-xl font-bold mb-4">
        Đăng nhập
    </h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email"
                :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Mật khẩu'" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember -->
        <div class="block mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm">
                <span class="ms-2 text-sm text-gray-600">
                    Ghi nhớ đăng nhập
                </span>
            </label>
        </div>

        <!-- BUTTON -->
        <div class="flex items-center justify-between mt-4">

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    Quên mật khẩu?
                </a>
            @endif

            <x-primary-button class="ms-3">
                Đăng nhập
            </x-primary-button>
        </div>

        <!-- LINK REGISTER -->
        <div class="text-center mt-4 text-sm">
            Chưa có tài khoản?
            <a href="{{ route('register') }}" class="text-blue-500">
                Đăng ký
            </a>
        </div>

    </form>
</x-guest-layout>