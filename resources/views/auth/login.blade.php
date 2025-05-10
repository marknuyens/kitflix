<x-layout class="max-w-2xl rounded-xl bg-white/10 my-12 px-8 py-7 mx-auto text-white ">
    <h1 class="text-3xl">{{ __('Log in') }}</h1>
    <hr class="border-white/20 my-6">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="flex flex-wrap gap-6">
            <fieldset class="w-full">
                <x-label class="inline-block mb-2" :text="__('E-mail:')" />
                <x-input name="email" value="{{ old('email') }}" placeholder="{{ __('Your e-mail address') }}" />
            </fieldset>
            <fieldset class="w-full">
                <x-label class="inline-block mb-2" :text="__('Password:')" />
                <x-input type="password" name="password" placeholder="{{ __('Your password') }}" />
            </fieldset>
        </div>
        <hr class="my-6 border-white/20">
        <x-button type="submit" class="block w-full" :text="__('Log into my account')" />
    </form>
</x-layout>
