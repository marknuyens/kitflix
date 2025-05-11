<x-layouts.auth :title="__('Sign up')" width="max-w-4xl">
    <form action="{{ route('register') }}" method="post">
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
            <hr class="mt-2 border-white/20 col-span-full">
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Password:')" />
                <x-input name="password" placeholder="{{ __('Your password') }}" />
            </fieldset>
            <fieldset>
                <x-label class="inline-block mb-2" :text="__('Confirm password:')" />
                <x-input name="confirm_password" placeholder="{{ __('Confirm password') }}" />
            </fieldset>
        </div>
        <hr class="my-6 border-white/20">
        <x-primary-button type="submit" disabled class="disabled:cursor-not-allowed opacity-50 block w-full" :text="__('Start my Kitflix experience!')" />
    </form>
</x-layouts.auth>
