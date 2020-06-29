<form method="GET" style="display:inline-block">
    <select class="locale-combo" name="{{ config('localization.query_var') }}" onchange="this.parentElement.submit()">
        @foreach(config('localization.available_locales') as $locale)
            <option value="{{ $locale }}" {{ app()->getLocale() == $locale ? 'selected' : '' }}>{{ strtoupper($locale)  }}</option>
        @endforeach
    </select>
</form>