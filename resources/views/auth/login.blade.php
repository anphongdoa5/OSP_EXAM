<x-guest-layout>

    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.png') }}" style="width:80px; display:block; margin:0 auto;">
    </div>

    <h2 class="text-center text-xl font-bold mb-4">
        Đăng nhập
    </h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email"
                :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="'Mật khẩu'" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm">
                <span class="ms-2 text-sm text-gray-600">
                    Ghi nhớ đăng nhập
                </span>
            </label>
        </div>

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

        <div class="text-center mt-4 text-sm">
            Chưa có tài khoản?
            <a href="{{ route('register') }}" class="text-blue-500">
                Đăng ký
            </a>
        </div>

    </form>
</x-guest-layout>