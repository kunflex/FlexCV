<x-guest-layout>
    @section('title', 'Login | FlexCV Official Website')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1>Welcome back</h1>
     <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="tab">
            <x-text-input id="email" class="block mt-1 w-full" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="tab">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            placeholder="Password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="tab">
            <button>
                {{ __('Log In') }}
            </button>
        </div>

        <div class="tab" style="text-align:center;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color:darkred;">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="tab" style="text-align:center;">
            <div>Don't have an account?  <a href="{{url('register')}}" style="color:#0095FF;">{{'Sign Up'}}</a></div>
            <div class="divider">
                <div class="line"></div>
                <div> OR </div>
                <div class="line"></div>
            </div>
        </div>

        <a href="">
            <div class="tab1">
                <div>
                    <svg width="25px" height="25px" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            
                        <title>Google-color</title>
                        <desc>Created with Sketch.</desc>
                        <defs>

                        </defs>
                            <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Color-" transform="translate(-401.000000, -860.000000)">
                                    <g id="Google" transform="translate(401.000000, 860.000000)">
                                        <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05">

                        </path>
                                        <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335">

                        </path>
                                        <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853">

                        </path>
                                        <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4">

                        </path>
                                    </g>
                                </g>
                            </g>
                    </svg>
                </div>
                <div class="text">{{'Continue with Google'}}</div>
            </div>
        </a>

        <a href="">
            <div class="tab1">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="blue" height="25px" width="25px" version="1.1" id="Layer_1" viewBox="-143 145 512 512" xml:space="preserve">
                        <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M169.5,357.6l-2.9,38.3h-39.3  v133H77.7v-133H51.2v-38.3h26.5v-25.7c0-11.3,0.3-28.8,8.5-39.7c8.7-11.5,20.6-19.3,41.1-19.3c33.4,0,47.4,4.8,47.4,4.8l-6.6,39.2  c0,0-11-3.2-21.3-3.2c-10.3,0-19.5,3.7-19.5,14v29.9H169.5z"/>
                    </svg>
                </div>
                <div class="text">{{'Continue with Facebook'}}</div>
            </div>
        </a>

    </form>

    <div class="footer">
        <a href="" style="color:#ccc">Terms of use | Privacy policy</a>
    </div>

        
    </form>
</x-guest-layout>
