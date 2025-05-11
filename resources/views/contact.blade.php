<x-layouts.auth :title="__('Contact us')" width="max-w-7xl">
    <p>
        We will make it our best priority to handle your question.
    </p>
    <form action="{{ route('contact') }}" method="post" class="mt-8">
        @csrf
        <div class="flex flex-wrap gap-6">
            <fieldset class="w-full">
                <x-label class="inline-block mb-2" :text="__('E-mail:')" />
                <x-input name="email" value="{{ old('email') }}" placeholder="{{ __('Your e-mail address') }}" />
            </fieldset>
            <fieldset class="w-full">
                <x-label class="inline-block mb-2" :text="__('Message:')" />
                <textarea name="message" class="block w-full rounded-lg bg-white text-black p-4 text-lg" rows="6"></textarea>
            </fieldset>
        </div>
        <hr class="my-6 border-white/20">
        <x-primary-button type="submit" class="block w-full" :text="__('Log into my account')" />
    </form>
</x-layout>
