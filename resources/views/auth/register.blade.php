<x-layout class="max-w-7xl rounded-xl bg-white/10 my-12 px-10 py-9 mx-auto text-white ">
    <h1 class="text-3xl">{{ __('Sign up') }}</h1>
    <hr class="border-white/20 my-6">
    <form action="{{ route('register') }}">
        @csrf
        <div class="grid grid-cols-2 gap-x-12 gap-y-6">
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Full name:')" />
                <x-input name="name" placeholder="{{ __('Your full name') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('E-mail address:')" />
                <x-input type="email" name="email" placeholder="{{ __('Your e-mail address') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Address:')" />
                <x-input name="address" placeholder="{{ __('Your address') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Zip code:')" />
                <x-input name="zipcode" maxlength="8" placeholder="{{ __('Your zip code') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('City:')" />
                <x-input name="city" placeholder="{{ __('Your city') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Country:')" />
                <x-select name="country" :options="['nl' => 'Netherlands', 'be' => 'Belgium', 'etc' => 'Etcetera...']" />
            </fieldset>
        </div>
        <hr class="my-6 border-white/20">
        <x-button type="submit" class="block w-full" :text="__('Start my Kitflix experience!')" />
    </form>
</x-layout>
