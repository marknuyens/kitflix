<header class=" bg-white/10 border-b border-white/5 py-4 px-6 2xl:px-0">
    <nav class="flex gap-8 md:gap-12 lg:gap-24 items-center mx-auto max-w-7xl text-white text-sm">
        <a href="{{ route('home') }}">
            <span class="block md:hidden text-3xl">🐱</span>
            <span class="hidden md:block">
                <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="max-w-64 h-12" />
            </span>
        </a>
        <ul class="flex gap-6 lg:gap-8 text-lg">
            <li><a href="{{ route('home') }}"
                    @if (request()->routeIs('home')) class="text-red-500" @endif>{{ __('Home') }}</a></li>
            <li><a href="{{ route('genres') }}">{{ __('Genres') }}</a></li>
            <li><a href="{{ route('my-list') }}">{{ __('My List') }}</a></li>
        </ul>
        <div class="ml-auto">
            @auth
                <span class="flex gap-6">
                    🧑 {{ __('Welcome') }}, &nbsp;{{ auth()->user()->first_name }}!
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 font-bold cursor-pointer">{{ __('Log out') }}</button>
                    </form>
                </span>
            @else
                <div class=" flex gap-4">
                    <x-button href="{{ route('login') }}" :text="__('Login')" />
                    <x-button href="{{ route('register') }}" :text="__('Sign up')" />
                @endauth
            </div>
        </div>
    </nav>
</header>
