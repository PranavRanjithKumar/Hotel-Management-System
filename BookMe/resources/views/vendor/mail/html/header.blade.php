<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BookMe')
<img src="{{ asset('img/bookme-logo.PNG') }}" class="logo" alt="BookMe Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
