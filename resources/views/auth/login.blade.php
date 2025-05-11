<x-layouts.auth :title="__('Login')" width="max-w-lg">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="flex flex-wrap gap-6">
            <fieldset class="w-full">
                <x-label class="inline-block mb-2" :text="__('E-mail:')" />
                <x-input name="email" value="owner@kitflix.be" placeholder="{{ __('Your e-mail address') }}" />
            </fieldset>
            <fieldset class="w-full">
                <x-label class="inline-block mb-2" :text="__('Password:')" />
                <x-input type="password" name="password" placeholder="{{ __('The password is...... \'password\'') }}" />
            </fieldset>
        </div>
        <hr class="my-6 border-white/20">
        <x-primary-button type="submit" class="block w-full" :text="__('Log into my account')" />
    </form>
</x-layout>
