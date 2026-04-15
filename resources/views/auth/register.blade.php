<x-guest-layout>

<div class="logo-box mb-4">
           <img src="{{ asset('images/logo.png') }}" style="width:80px; display:block; margin:0 auto;">
            <h3 class="mt-2 text-center">ĐĂNG KÝ</h3>
            </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="'Họ và tên'" />
            <x-text-input id="name" class="block mt-1 w-full"
                type="text" name="name"
                :value="old('name')" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email"
                :value="old('email')" required />
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

        <!-- Confirm -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Nhập lại mật khẩu'" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
        </div>

        <!-- BUTTON -->
        <div class="flex items-center justify-between mt-4">

            <a href="{{ route('login') }}"
               class="text-sm text-gray-600 hover:text-gray-900">
                Đã có tài khoản?
            </a>

            <x-primary-button class="ms-3">
                Đăng ký
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>