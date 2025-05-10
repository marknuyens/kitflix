<footer class="max-w-7xl flex justify-between mx-auto py-12 mt-16 border-t border-white/10">
    <ul class="flex gap-8 text-white">
        <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li><a href="{{ route('genres') }}">{{ __('Genres') }}</a></li>
        <li><a href="{{ route('my-list') }}">{{ __('My List') }}</a></li>
    </ul>
    <ul class="flex gap-8 text-white">
        <li><a href="{{ route('privacy') }}">{{ __('Privacy') }}</a></li>
        <li><a href="{{ route('terms') }}">{{ __('Terms & Conditions') }}</a></li>
        <li><a href="{{ route('support') }}">{{ __('Support') }}</a></li>
    </ul>
</footer>