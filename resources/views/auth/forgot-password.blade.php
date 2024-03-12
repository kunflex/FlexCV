<x-guest-layout><h1>Forgot password?</h1>
    <div class="tab" style="color:gray">
        {{ __(' No problem. We will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="tab">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Link') }}
            </x-primary-button>
        </div>
    </form>

    <div class="footer">
        <a href="" style="color:#ccc">Terms of use | Privacy policy</a>
    </div>
</x-guest-layout>
