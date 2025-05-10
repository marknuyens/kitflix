<x-layout class="max-w-7xl rounded-xl bg-white/10 my-12 px-10 py-9 mx-auto text-white ">
    <h1 class="text-3xl">{{ __('Log in') }}</h1>
    <hr class="border-white/20 my-6">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-x-12 gap-y-6">
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('E-mail:')" />
                <x-input name="email" value="{{ old('email') }}" placeholder="{{ __('Your e-mail address') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Password:')" />
                <x-input type="password" name="password" placeholder="{{ __('Your password') }}" />
            </fieldset>
        </div>
        <hr class="my-6 border-white/20">
        <x-button type="submit" class="block w-full" :text="__('Log into my account')" />
    </form>
</x-layout>
