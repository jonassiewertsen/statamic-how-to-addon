@if (config('howToAddon.show_created_by'))
    <footer class="mt-1 text-2xs text-right text-grey-50">
        {{ __('howToAddon::general.footer.createdBy') }} <a class="text-grey-50 hover:text-grey-60" href="https://jonassiewertsen.com">Jonas Siewertsen</a>
    </footer>
@endif